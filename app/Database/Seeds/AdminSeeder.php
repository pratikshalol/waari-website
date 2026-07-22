<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name'       => 'Waari Admin',
                'email'      => 'admin@waari.in',
                'password'   => password_hash('admin@123', PASSWORD_DEFAULT),
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
 
        $this->db->table('admins')->insertBatch($data);
    }
}
