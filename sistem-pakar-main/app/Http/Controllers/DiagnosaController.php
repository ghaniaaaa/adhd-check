<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\KondisiUser;
use App\Models\TingkatKecenderungan;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DiagnosaController extends Controller
{
    public function index()
    {
    $diagnosa = \App\Models\Diagnosa::latest()->get();

    return view('admin.diagnosa.admin_semua_diagnosa', compact('diagnosa'));
    }

    // Halaman Form Diagnosa
    public function create()
    {
        $data = [
            'gejala' => Gejala::all(),
            'kondisi_user' => KondisiUser::all()
        ];
        return view('clients.form_diagnosa', $data);
    }

    // Proses Diagnosa Forward Chaining
    public function store(Request $request)
    {
        $dataGejala = $request->post('kondisi'); // array kode_gejala => nilai 0-4

        // Pisahkan berdasarkan bagian A dan B
        $partA = [];
        $partB = [];

        foreach ($dataGejala as $kode => $nilai) {
            $gejala = Gejala::where('kode_gejala', $kode)->first();
            if ($gejala->bagian == 'A') {
                $partA[] = (int)$nilai; //['kode' => $kode, 'nilai' => (int)$nilai];
            } else {
                $partB[] = (int)$nilai; //['kode' => $kode, 'nilai' => (int)$nilai];
            }
        }

        // Hitung total skor dan jumlah gejala bernilai > 0
        $skorA = array_sum(array_column($partA, 'nilai'));
        $skorB = array_sum(array_column($partB, 'nilai'));
        // $jumlahGejalaA = count(array_filter($partA, fn($item) => $item['nilai'] > 0));
        // $jumlahGejalaB = count(array_filter($partB, fn($item) => $item['nilai'] > 0));

        // Tentukan hasil
        $hasil = "Tidak Ada";

        if ($skorA >= 24 || $skorB >= 24) {
            $hasil = "Tinggi";
        } elseif ($skorA >= 17 || $skorB >= 17) {
            $hasil = "Sedang";
        }

        // Simpan Diagnosa
        $diagnosa = Diagnosa::create([
            'kode_diagnosa' => uniqid('ADHD-'),
            'data_diagnosa' => json_encode($dataGejala),
            'hasil' => $hasil
        ]);

        return redirect()->route('diagnosa.hasil', $diagnosa->id);
    }

    // Tampilkan Hasil Diagnosa
    public function diagnosaResult($id)
    {
        $diagnosa = Diagnosa::findOrFail($id);
        $dataGejala = json_decode($diagnosa->data_diagnosa, true);

        $gejalaDetail = [];
        foreach ($dataGejala as $kode => $nilai) {
            $gejalaDetail[] = [
                'gejala' => Gejala::where('kode_gejala', $kode)->first(),
                'nilai' => $nilai
            ];
        }

        $artikel = Artikel::where('kode_kecenderungan', $diagnosa->hasil)->first();

        return view('clients.cl_diagnosa_result', compact('diagnosa', 'gejalaDetail', 'artikel'));
    }

    // Export PDF
    public function cetakPDF($id)
    {
        $diagnosa = Diagnosa::findOrFail($id);
        $dataGejala = json_decode($diagnosa->data_diagnosa, true);

        $gejalaDetail = [];
        foreach ($dataGejala as $kode => $nilai) {
            $gejala = Gejala::where('kode_gejala', $kode)->first();
        if ($gejala) {
            $gejalaDetail[] = [
                'kode' => $kode,
                'nama' => $gejala->gejala,
                'bagian' => $gejala->bagian,
                'nilai' => $nilai
            ];
        }
    }
    
       // Ambil artikel berdasarkan hasil diagnosa (Tinggi/Sedang/Tidak Ada)
    $artikel = Artikel::where('kode_kecenderungan', $diagnosa->hasil)->first();
    
    $pdf = Pdf::loadView('clients.diagnosa_pdf', [
        'diagnosa' => $diagnosa,
        'gejalaDetail' => $gejalaDetail,
        'artikel' => $artikel 
    ]);

    return $pdf->download('Hasil_Diagnosa_ADHD_'.$diagnosa->kode_diagnosa.'.pdf');
    }
}
