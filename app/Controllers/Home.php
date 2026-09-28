<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $taskModel = new \App\Models\TaskModel();
$tasks = $taskModel->getTodayTasks();
return view('welcome', ['tasks' => $tasks]);
    }
        public function tasks(): string
    {
        $taskModel = new \App\Models\TaskModel();
        $tasks = $taskModel->getAllTasks();

        return view('tasks', ['tasks' => $tasks]);
    }
        public function profile(): string
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->first();

        return view('profile', ['user' => $user]);
    }
    public function about()
{
    return view('about');
}
}
