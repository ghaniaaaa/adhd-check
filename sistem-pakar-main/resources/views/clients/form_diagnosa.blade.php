@extends('layouts.app') {{-- Ganti sesuai layout kamu --}}
@section('title', 'Form Diagnosa ADHD')

@section('content')
<style>
    /* === Styling form diagnosa ADHD === */
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #f7f9fc;
        color: #333;
    }

    .container-form {
        max-width: 800px;
        margin: 40px auto;
        padding: 30px;
        background: white;
        border-radius: 16px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
    }

    .container-form h2 {
        text-align: center;
        margin-bottom: 10px;
        font-size: 28px;
        color: #2c3e50;
    }

    .container-form p {
        text-align: center;
        margin-bottom: 30px;
        font-size: 16px;
        color: #555;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        font-weight: 600;
        display: block;
        margin-bottom: 10px;
        color: #2c3e50;
    }

    .radio-options {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .radio-options label {
        display: flex;
        align-items: center;
        background: #f1f1f1;
        padding: 8px 12px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .radio-options label:hover {
        background-color: #e0e0e0;
    }

    .radio-options input[type="radio"] {
        margin-right: 8px;
    }

    .btn-submit {
        display: block;
        margin-left: auto;
        margin-top: 20px;
        background-color: #FF914D;
        color: white;
        padding: 12px 24px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .btn-submit:hover {
        background-color: #e07c3b;
    }
</style>

<div class="container-form">
    <h2>Deteksi Risiko ADHD</h2>
    <p>Dalam 6 bulan terakhir, seberapa sering kamu mengalami gejala-gejala berikut?</p>

    <form method="POST" action="{{ route('diagnosa.store') }}">
        @csrf

        @foreach($gejala as $item)
            <div class="form-group">
                <label for="gejala_{{ $loop->iteration }}">
                    {{ $loop->iteration }}. Apakah kamu merasa {{ $item->gejala }}?
                </label>
                <div class="radio-options">
                    @foreach($kondisi_user as $kondisi)
                        <label>
                            <input type="radio"
                                   name="kondisi[{{ $item->kode_gejala }}]"
                                   value="{{ $kondisi->nilai }}"
                                   required>
                            {{ $kondisi->kondisi }}
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn-submit">Kirim Jawaban</button>
    </form>
</div>
@endsection
