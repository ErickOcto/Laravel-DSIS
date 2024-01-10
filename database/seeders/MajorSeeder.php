<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Major::insert([
            [
            'name' => 'Teknik Komputer dan Jaringan',
            'url' => 'teknik-komputer-dan-jaringan',
            'photo' => '',
            'status' => 1,
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam nemo, quo ex quos provident expedita aliquam, consectetur saepe ratione culpa iusto facere vitae repellat tempora optio dolor. Ipsa corporis quae sed fugit. A alias neque, excepturi non possimus ipsa reprehenderit tempora magnam, quia, laboriosam fuga impedit quam! Amet architecto sit ex omnis veniam perferendis! Obcaecati nesciunt harum doloribus incidunt? Porro perspiciatis, eius veritatis natus suscipit blanditiis iste, aliquam voluptates labore nostrum, similique reiciendis commodi voluptatibus ipsa non odit quisquam sed? Esse quisquam, placeat cumque sint autem quis impedit dolorem quibusdam nihil iusto voluptatibus delectus veniam enim commodi labore corrupti ipsum ex, temporibus quo recusandae debitis laborum explicabo. Inventore, placeat fuga consectetur delectus dicta dolor facilis maxime ducimus maiores a fugit cumque explicabo, doloremque minima commodi amet, voluptates aperiam! Ea tenetur repellat cupiditate. Dicta rerum atque, eaque perspiciatis unde nulla maxime. Dignissimos, ducimus tempora deserunt vero ex numquam culpa animi iste hic facere harum voluptatem labore error beatae tempore itaque laboriosam exercitationem veniam quae! Quas libero vitae numquam maxime quia natus voluptatem ea asperiores mollitia sapiente magni temporibus dolores corrupti hic, ex porro! Ullam adipisci voluptates cumque deleniti saepe explicabo fuga officiis, ducimus hic aliquam sapiente, facilis autem? Explicabo, pariatur iusto.'
            ],
            [
            'name' => 'Rekayasa Perangkat Lunak',
            'url' => 'rekayasa-perangkat-lunak',
            'photo' => '',
            'status' => 1,
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam nemo, quo ex quos provident expedita aliquam, consectetur saepe ratione culpa iusto facere vitae repellat tempora optio dolor. Ipsa corporis quae sed fugit. A alias neque, excepturi non possimus ipsa reprehenderit tempora magnam, quia, laboriosam fuga impedit quam! Amet architecto sit ex omnis veniam perferendis! Obcaecati nesciunt harum doloribus incidunt? Porro perspiciatis, eius veritatis natus suscipit blanditiis iste, aliquam voluptates labore nostrum, similique reiciendis commodi voluptatibus ipsa non odit quisquam sed? Esse quisquam, placeat cumque sint autem quis impedit dolorem quibusdam nihil iusto voluptatibus delectus veniam enim commodi labore corrupti ipsum ex, temporibus quo recusandae debitis laborum explicabo. Inventore, placeat fuga consectetur delectus dicta dolor facilis maxime ducimus maiores a fugit cumque explicabo, doloremque minima commodi amet, voluptates aperiam! Ea tenetur repellat cupiditate. Dicta rerum atque, eaque perspiciatis unde nulla maxime. Dignissimos, ducimus tempora deserunt vero ex numquam culpa animi iste hic facere harum voluptatem labore error beatae tempore itaque laboriosam exercitationem veniam quae! Quas libero vitae numquam maxime quia natus voluptatem ea asperiores mollitia sapiente magni temporibus dolores corrupti hic, ex porro! Ullam adipisci voluptates cumque deleniti saepe explicabo fuga officiis, ducimus hic aliquam sapiente, facilis autem? Explicabo, pariatur iusto.'
            ]
        ]);
    }
}
