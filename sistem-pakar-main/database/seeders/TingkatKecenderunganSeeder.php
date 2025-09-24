<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TingkatKecenderungan;

class TingkatKecenderunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecenderungan = [
            ['kode_kecenderungan' => 'K001', 'kecenderungan_adhd' => 'Tinggi'],
            ['kode_kecenderungan' => 'K002', 'kecenderungan_adhd' => 'Sedang'],
            ['kode_kecenderungan' => 'K003', 'kecenderungan_adhd' => 'Tidak Ada'],
        ];

        foreach ($kecenderungan as $item) {
            TingkatKecenderungan::create($item);
        }
    }
}
