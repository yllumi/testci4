<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id'             => 1,
            'role_id'        => 1,
            'name'           => 'Admin',
            'phone'          => '628986818780',
            'email'          => 'admin@admin.com',
            'avatar'         => null,
            'pwd'            => '$P$BNYPQDNQL9XYv8nHgXW.sg2TITg6Gj/',
            'token'          => null,
            'otp'            => null,
            'otp_email'      => null,
            'otp_phone'      => null,
            'username'       => 'admin',
            'status'         => 'active',
            'status_message' => null,
            'active'         => 0,
            'last_active'    => null,
            'created_at'     => '2025-02-28 17:13:03',
            'updated_at'     => null,
            'deleted_at'     => null,
        ];

        // Insert ke table `users`
        $this->db->table('users')->insert($data);
    }
}
