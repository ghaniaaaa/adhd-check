<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Deteksi ADHD - {{ $diagnosa->kode_diagnosa }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.5;
        }
        h2, h3 {
            text-align: center;
            margin-bottom: 5px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 2px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        table th, table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        .summary {
            margin-bottom: 20px;
        }
        .summary p {
            margin: 4px 0;
        }
    </style>
</head>
<body>

    <h2>Hasil Deteksi Risiko ADHD</h2>
    <h3>{{ $diagnosa->kode_diagnosa }}</h3>

    <div class="info">
        <p><strong>Tanggal Diagnosa:</strong> {{ $diagnosa->created_at->format('d F Y H:i') }}</p>
    </div>

    {{-- Ringkasan Skor --}}
    @php
        $skorA = 0;
        $skorB = 0;
        foreach ($gejalaDetail as $item) {
            if ($item['bagian'] === 'A') $skorA += $item['nilai'];
            if ($item['bagian'] === 'B') $skorB += $item['nilai'];
        }
    @endphp

    <div class="summary">
        <p><strong>Total Skor Bagian A:</strong> {{ $skorA }}</p>
        <p><strong>Total Skor Bagian B:</strong> {{ $skorB }}</p>
        <p><strong>Kesimpulan Diagnosa:</strong> Risiko ADHD <strong>{{ strtoupper($diagnosa->hasil) }}</strong></p>
    </div>

    {{-- Tabel Gejala --}}
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Gejala</th>
                <th>Bagian</th>
                <th>Nama Gejala</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gejalaDetail as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['kode'] }}</td>
                    <td>{{ $item['bagian'] }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['nilai'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Rekomendasi Penanganan --}}
    @if(isset($artikel))
        <div class="summary">
            <h3>Rekomendasi Penanganan</h3>
            <p>{!! nl2br(e($artikel->isi)) !!}</p>
        </div>
    @else
        <p><em>Tidak ada rekomendasi penanganan tersedia untuk hasil ini.</em></p>
    @endif

</body>
</html>
