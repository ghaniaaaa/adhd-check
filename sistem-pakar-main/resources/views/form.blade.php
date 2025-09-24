@extends('layouts.form')

@push('styles')
<style>
  .diagnosa-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 2rem;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  }

  .diagnosa-container h2 {
    font-size: 24px;
    color: #012970;
    margin-bottom: 1rem;
  }

  .question-item {
    margin-bottom: 2rem;
  }

  .question-item label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
  }

  .gfield_radio {
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
  }

  .gfield_radio li {
    list-style: none;
    display: flex;
    align-items: center;
  }

  .gfield_radio input[type="radio"] {
    margin-right: 6px;
  }
</style>
@endpush

@section('content')
<div class="diagnosa-container">
  <h2>Tes Risiko ADHD</h2>
  <form method="POST" action="{{ route('diagnosa.store') }}">
    @csrf

    <p><strong>Dalam 6 bulan terakhir</strong>, seberapa sering masalah-masalah berikut ini mengganggu kamu?</p>
    <p>Semua pertanyaan wajib dijawab sesuai pengalaman pribadi.</p>

    @foreach($gejala as $item)
    <div class="question-item">
      <label for="pertanyaan_{{ $loop->iteration }}">{{ $loop->iteration }}. Apakah kamu merasa {{ $item->gejala }}?</label>
      <ul class="gfield_radio">
        @foreach($kondisi_user as $kondisi)
        <li>
          <input type="radio" name="input_{{ $loop->parent->iteration }}" value="{{ $kondisi->nilai }}" id="choice_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
            onchange="document.getElementById('kondisi_{{ $item->kode_gejala }}{{ $loop->parent->iteration }}').value = this.value">
          <label for="choice_{{ $loop->parent->iteration }}_{{ $loop->iteration }}">{{ $kondisi->kondisi }}</label>
        </li>
        @endforeach
      </ul>
      <input type="hidden" name="kondisi[{{ $item->kode_gejala }}]" id="kondisi_{{ $item->kode_gejala }}{{ $loop->iteration }}" value="">
    </div>
    @endforeach

    <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
  </form>
</div>
@endsection