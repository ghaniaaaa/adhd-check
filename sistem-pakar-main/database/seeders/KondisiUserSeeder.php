<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KondisiUser;

class KondisiUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kondisis = [
            ['kondisi' => 'Tidak Pernah', 'nilai' => 0],
            ['kondisi' => 'Jarang', 'nilai' => 1],
            ['kondisi' => 'Kadang-kadang', 'nilai' => 2],
            ['kondisi' => 'Sering', 'nilai' => 3],
            ['kondisi' => 'Sangat Sering', 'nilai' => 4],
        ];

        foreach ($kondisis as $item) {
            KondisiUser::create($item);
        }
    }
}
