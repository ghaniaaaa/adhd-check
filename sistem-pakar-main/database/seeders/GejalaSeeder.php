<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gejala;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gejalas = [
            ['kode_gejala' => 'G001', 'gejala' => 'sering melakukan kesalahan karena kurang teliti saat mengerjakan tugas yang dirasa membosankan atau sulit', 'bagian' => 'A'],
            ['kode_gejala' => 'G002', 'gejala' => 'sulit mempertahankan perhatian pada tugas yang dirasa membosankan dan monoton', 'bagian' => 'A'],
            ['kode_gejala' => 'G003', 'gejala' => 'kesulitan fokus saat mendengarkan orang lain berbicara bahkan ketika berinteraksi secara langsung', 'bagian' => 'A'],
            ['kode_gejala' => 'G004', 'gejala' => 'kesulitan menyelesaikan detail akhir dari tugas setelah bagian tersulit berhasil diselesaikan', 'bagian' => 'A'],
            ['kode_gejala' => 'G005', 'gejala' => 'kesulitan merapikan atau mengatur sesuatu saat mengerjakan tugas yang butuh keteraturan', 'bagian' => 'A'],
            ['kode_gejala' => 'G006', 'gejala' => 'sering menghindari dan menunda tugas yang memerlukan proses berpikir yang kompleks', 'bagian' => 'A'],
            ['kode_gejala' => 'G007', 'gejala' => 'sering kehilangan dan kesulitan menemukan barang di rumah atau tempat kerja', 'bagian' => 'A'],
            ['kode_gejala' => 'G008', 'gejala' => 'mudah terdistraksi oleh aktivitas atau suara yang ada di sekitar', 'bagian' => 'A'],
            ['kode_gejala' => 'G009', 'gejala' => 'sering lupa akan janji atau kewajiban yang harus dilakukan', 'bagian' => 'A'],
            ['kode_gejala' => 'G010', 'gejala' => 'sering menggoyangkan tangan atau kaki saat harus duduk dalam waktu lama', 'bagian' => 'B'],
            ['kode_gejala' => 'G011', 'gejala' => 'sering meninggalkan tempat duduk pada situasi yang mengharuskan tetap duduk', 'bagian' => 'B'],
            ['kode_gejala' => 'G012', 'gejala' => 'sering merasa gelisah atau tidak bisa diam', 'bagian' => 'B'],
            ['kode_gejala' => 'G013', 'gejala' => 'kesulitan bersantai dan menenangkan diri di saat waktu luang', 'bagian' => 'B'],
            ['kode_gejala' => 'G014', 'gejala' => 'sering merasa sangat aktif dan terdorong untuk terus melakukan sesuatu seolah-olah badan digerakkan oleh mesin', 'bagian' => 'B'],
            ['kode_gejala' => 'G015', 'gejala' => 'sering berbicara berlebihan', 'bagian' => 'B'],
            ['kode_gejala' => 'G016', 'gejala' => 'sering memotong pembicaraan orang lain sebelum mereka selesai berbicara', 'bagian' => 'B'],
            ['kode_gejala' => 'G017', 'gejala' => 'kesulitan menunggu giliran dalam situasi yang mengharuskan antre atau bergiliran', 'bagian' => 'B'],
            ['kode_gejala' => 'G018', 'gejala' => 'sering menyela atau mengganggu aktivitas orang lain', 'bagian' => 'B'],
        ];

        foreach($gejalas as $gejala){
            Gejala::updateOrCreate(
                ['kode_gejala' => $gejala['kode_gejala']],
                $gejala);
        }
    }
}
