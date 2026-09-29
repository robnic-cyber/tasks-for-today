<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoUserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')
            ->where('username', 'robnic')
            ->update([
                'password' => password_hash('TaskDemo2026', PASSWORD_DEFAULT),
            ]);
    }
}