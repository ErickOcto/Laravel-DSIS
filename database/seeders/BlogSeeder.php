<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::insert([
            [
            'judul' => 'Tutorial agar cepat sugih dalam 1 suro',
            'photo' => '',
            'slug' => 'tutorial-agar-cepat-sugih-dalam-1-suro',
            'carousel' => 0,
            'konten' => 'Tutorial agar cepat sugih dalam 1 suro',
            'user_id' => 1,
            'category_id' => 1,
            'lihat' => 0
            ],
            [
            'judul' => '10 Cara agar kita jago dalam jawa-skrip',
            'photo' => '',
            'slug' => '10-cara-agar-kita-jago-dalam-jawa-skrip',
            'carousel' => 0,
            'konten' => '10 Cara agar kita jago dalam jawa-skrip',
            'user_id' => 1,
            'category_id' => 2,
            'lihat' => 0
            ],
            [
            'judul' => 'Ternyata ini alasan putin ingin serang israel',
            'photo' => '',
            'slug' => 'ternyata-ini-alasan-putin-ingin-serang-israel',
            'carousel' => 0,
            'konten' => 'Ternyata ini alasan putin ingin serang israel',
            'user_id' => 1,
            'category_id' => 2,
            'lihat' => 0
            ]
        ]);
    }
}
