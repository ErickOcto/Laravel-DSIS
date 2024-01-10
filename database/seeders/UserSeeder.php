<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'classroom_id' => 1,
            'is_admin' => 0,
            ],
            [
            'name' => 'Ifa',
            'email' => 'shifa@example.com',
            'password' => bcrypt('password'),
            'classroom_id' => 1,
            'is_admin' => 1,
            ],
            [
            'name' => 'Iyaka Samanda Caysar',
            'email' => 'iyaka@example.com',
            'password' => bcrypt('password'),
            'classroom_id' => 2,
            'is_admin' => 1,
            ],
            [
            'name' => 'Dafa Pandu Pratama Purwanto',
            'email' => 'dafa@example.com',
            'password' => bcrypt('password'),
            'classroom_id' => 1,
            'is_admin' => 1,
            ],
            [
            'name' => 'Gerlach Novellino Morgaret',
            'email' => 'novel@example.com',
            'password' => bcrypt('password'),
            'classroom_id' => 2,
            'is_admin' => 1,
            ],
            [
            'name' => 'Erick',
            'email' => 'erick@example.com',
            'password' => bcrypt('password'),
            'classroom_id' => 1,
            'is_admin' => 2,
            ]
        ]);
    }
}
