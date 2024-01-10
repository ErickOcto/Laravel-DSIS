<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classroom::insert([
            [
            'name' => 'Kelas X RPL',
            'major_id' => 2,
            ],
            [
            'name' => 'Kelas XI RPL',
            'major_id' => 2,
            ],
            [
            'name' => 'Kelas XII RPL',
            'major_id' => 2,
            ]
        ]);
    }
}
