<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskManager extends BaseController
{
    public function new()
    {
        return view('task_form', ['task' => null]);
    }

    public function create()
    {
        if (! $this->validTask()) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        (new TaskModel())->insert([
            'title'       => trim((string) $this->request->getPost('title')),
            'task_date'   => $this->request->getPost('task_date'),
            'status'      => $this->request->getPost('status'),
            'created_at'  => date('Y-m-d H:i:s'),
            'is_archived' => 0,
        ]);

        return redirect()->to(site_url('tasks'));
    }

    public function edit(int $id)
    {
        $task = (new TaskModel())->find($id);

        if (! $task || $task['is_archived']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('task_form', ['task' => $task]);
    }

    public function update(int $id)
    {
        $model = new TaskModel();
        $task = $model->find($id);

        if (! $task || $task['is_archived']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if (! $this->validTask()) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model->update($id, [
            'title'     => trim((string) $this->request->getPost('title')),
            'task_date' => $this->request->getPost('task_date'),
            'status'    => $this->request->getPost('status'),
        ]);

        return redirect()->to(site_url('tasks'));
    }

    public function delete(int $id)
    {
        $model = new TaskModel();
        $task = $model->find($id);

        if (! $task || $task['is_archived']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $model->update($id, ['is_archived' => 1]);

        return redirect()->to(site_url('tasks'));
    }

    private function validTask(): bool
    {
        return $this->validate([
            'title'     => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status'    => 'required|in_list[pending,completed]',
        ]);
    }
}