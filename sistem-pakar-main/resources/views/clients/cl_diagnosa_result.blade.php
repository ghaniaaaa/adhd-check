@extends('clients.cl_main')
@section('title', 'Hasil Diagnosa')

@section('cl_content')
<div class="container my-4">
    <div class="row">
        <div class="col-md-10 mx-auto">

            {{-- Ringkasan Diagnosa --}}
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">Hasil Deteksi</div>
                <div class="card-body">
                    <h5 class="card-title">Kode Diagnosa: {{ $diagnosa->kode_diagnosa }}</h5>
                    <p class="card-text">Tingkat Risiko ADHD: <strong>{{ $diagnosa->hasil }}</strong></p>
                    <a href="{{ route('diagnosa.cetak', $diagnosa->id) }}" target="_blank" class="btn btn-outline-primary">
                        Download Hasil Diagnosa dalam bentuk PDF
                    </a>
                </div>
            </div>

            {{-- Detail Gejala --}}
            <div class="card mb-4">
                <div class="card-header bg-secondary text-white">Detail Gejala yang Dipilih</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Gejala</th>
                                <th>Gejala</th>
                                <th>Skor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gejalaDetail as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item['gejala']->kode_gejala }}</td>
                                    <td>{{ $item['gejala']->gejala }}</td>
                                    <td>{{ $item['nilai'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Rekomendasi Artikel --}}
            @if ($artikel)
            <div class="card mb-4 border-success">
                <div class="card-header bg-success text-white">Rekomendasi Tindakan</div>
                <div class="card-body">
                    @if ($artikel->url_gambar)
                        <img src="{{ asset('storage/' . $artikel->url_gambar) }}" class="img-fluid mb-3 rounded" alt="Gambar Artikel">
                    @endif
                    <h5 class="card-title">{{ $artikel->judul }}</h5>
                    <p class="card-text">{{ $artikel->isi }}</p>
                </div>
            </div>
            @endif

            {{-- Tombol Kembali --}}
<div class="d-flex justify-content-between mt-4">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary"> Kembali ke Halaman Utama</a>
</div>        </div>
    </div>
</div>
@endsection
