<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artikel;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artikels = [
            [
                'kode_kecenderungan' => 'Tinggi',
                'url_gambar' => 'https://example.com/image.jpg',
                'judul' => 'Kamu memiliki kecenderungan tinggi mengalami ADHD di usia dewasa',
                'isi' => 'Segera lakukan pemeriksaan dengan tenaga ahli kesehatan mental untuk mendapatkan pengecekan ulang & tindakan lebih lanjut untuk memahami kondisi ADHD',
            ],
            [
                'kode_kecenderungan' => 'Sedang',
                'url_gambar' => 'https://example.com/image.jpg',
                'judul' => 'Kamu memiliki kecenderungan sedang mengalami ADHD di usia dewasa',
                'isi' => 'Jika gejala sudah berlangsung selama 6 bulan, segera lakukan pemeriksaan dengan tenaga ahli kesehatan mental untuk mendapatkan pengecekan ulang. Jika gejala dialami kurang dari 6 bulan, observasi kondisi diri selama 6 bulan kemudian lakukan tes ulang',
            ],
            [
                'kode_kecenderungan' => 'Tidak Ada',
                'url_gambar' => 'https://example.com/image.jpg',
                'judul' => 'Kamu tidak memiliki kecenderungan menderita ADHD di usia dewasa',
                'isi' => 'Saat ini kamu tidak terindikasi ADHD, namun tetap perhatikan kesehatan mentalmu ya. Jika suatu saat muncul gejala, observasi diri selama 6 bulan kemudian lakukan tes ulang',
            ],
        ];

        foreach ($artikels as $artikel) {
            Artikel::create($artikel);
        }
    }
}
