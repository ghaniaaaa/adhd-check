@extends('admin.admin_main')
@section('title', 'Dashboard')

{{-- isi --}}
@section('admin_content')
    <!-- Page content-->
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-hover mt-2 p-2">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Diagnosa ID</th>
                            <th scope="col">Tingkat Risiko ADHD</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($diagnosa as $item)
                                <tr>
                                     <th scope="row">{{ $loop->iteration }}</th>
                                     <td>{{ $item->kode_diagnosa }}</td>
                                     <td>{{ $item->hasil }}</td>
                                     <td><a class="p-2" href="{{ route('diagnosa.hasil', $item->id) }}">Detail</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
