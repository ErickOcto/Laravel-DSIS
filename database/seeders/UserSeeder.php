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
            'major_id' => 1,
            'is_admin' => 0,
            ],
            [
            'name' => 'Shifa Sharifah Maulida',
            'email' => 'shifa@example.com',
            'password' => bcrypt('password'),
            'major_id' => 1,
            'is_admin' => 1,
            ],
            [
            'name' => 'Erick',
            'email' => 'erick@example.com',
            'password' => bcrypt('password'),
            'major_id' => 1,
            'is_admin' => 2,
            ]
        ]);
    }
}
