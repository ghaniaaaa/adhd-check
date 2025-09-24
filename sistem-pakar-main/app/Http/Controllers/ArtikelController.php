<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();
        return view('admin.artikel.artikel', compact('artikel'));
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
     * @param  \App\Http\Requests\StoreArtikelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtikelRequest $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kode_kecenderungan' => 'required|exists:tingkat_kecenderungan,kode_kecenderungan',
            'url_gambar' => 'nullable'
        ]);

        Artikel::create($request->all());

        return redirect()->route('artikel.index')->with('pesan', '<div class="alert alert-success p-3 mt-3">Artikel berhasil ditambahkan.</div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtikelRequest  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtikelRequest $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kode_kecenderungan' => 'required|exists:tingkat_kecenderungan,kode_kecenderungan'
        ]);

        $artikel->update($request->all());

        return redirect()->route('artikel.index')->with('pesan', '<div class="alert alert-info p-3 mt-3">Artikel berhasil diperbarui.</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect()->route('artikel.index')->with('pesan', '<div class="alert alert-danger p-3 mt-3">Artikel berhasil dihapus.</div>');
    }
}
