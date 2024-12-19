<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name_user' => 'admin',
            'email' => 'admin@ecommerce.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role' => 'admin',
        ];

        $this->db->table('users')->insert($data);
    }
}
