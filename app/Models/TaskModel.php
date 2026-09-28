<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

      public function getAllTasks(): array
    {
               return $this
            ->orderBy('task_date', 'ASC')
            ->findAll();
    }  
       public function getTodayTasks(): array
    {
        $today = $this->db
            ->query('SELECT CURDATE() AS today')
            ->getRow()->today;

        return $this
            ->where('task_date', $today)
            ->findAll();
    } 
}