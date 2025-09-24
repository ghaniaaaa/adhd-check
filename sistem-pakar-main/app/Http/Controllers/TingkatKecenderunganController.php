<?php

namespace App\Http\Controllers;

use App\Models\TingkatKecenderungan;
use App\Http\Requests\StoreTingkatKecenderunganRequest;
use App\Http\Requests\UpdateTingkatKecenderunganRequest;

class TingkatKecenderunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecenderungan = TingkatKecenderungan::all();
        return view('admin.kecenderungan.kecenderungan', compact('kecenderungan'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTingkatDepresiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTingkatKecenderunganRequest $request)
    {
       $request->validate([
            'kode_kecenderungan' => 'required|unique:tingkat_kecenderungan,kode_kecenderungan',
            'kecenderungan_adhd' => 'required'
        ]);

        TingkatKecenderungan::create($request->all());

        return redirect()->route('kecenderungan.index')->with('pesan', '<div class="alert alert-success p-3 mt-3">Data kecenderungan berhasil ditambahkan.</div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TingkatDepresi  $tingkatKecenderungan
     * @return \Illuminate\Http\Response
     */
    public function show(TingkatKecenderungan $tingkatKecenderungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TingkatKecenderungan  $tingkatKecenderungan
     * @return \Illuminate\Http\Response
     */
    public function edit(TingkatKecenderungan $tingkatKecenderungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTingkatDepresiRequest  $request
     * @param  \App\Models\TingkatDepresi  $tingkatDepresi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTingkatKecenderunganRequest $request, TingkatKecenderungan $tingkatKecenderungan)
    {
         $request->validate([
            'kecenderungan_adhd' => 'required'
        ]);

        $tingkatKecenderungan->update($request->all());

        return redirect()->route('kecenderungan.index')->with('pesan', '<div class="alert alert-info p-3 mt-3">Data kecenderungan berhasil diperbarui.</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TingkatDepresi  $tingkatDepresi
     * @return \Illuminate\Http\Response
     */
    public function destroy($tingkatKecenderungan)
    {
        $tingkatKecenderungan->delete();
        return back()->with('pesan', 'Kecenderungan berhasil dihapus');
    }
}
