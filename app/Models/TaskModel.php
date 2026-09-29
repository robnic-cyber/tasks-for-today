<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'title', 'status', 'task_date', 'created_at', 'is_archived'
    ];

    public function getAllTasks(): array
    {
        return $this
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();
    }

    public function getTodayTasks(): array
    {
        $today = $this->db
            ->query('SELECT CURDATE() AS today')
            ->getRow()->today;

        return $this
            ->where('is_archived', 0)
            ->where('task_date', $today)
            ->findAll();
    }
}