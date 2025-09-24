<?php

namespace App\Http\Controllers;

use App\Models\KondisiUser;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKondisiUserRequest;
use App\Http\Requests\UpdateKondisiUserRequest;

class KondisiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kondisi = KondisiUser::all();
        return view('admin.kondisi.index', compact('kondisi'));
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
     * @param  \App\Http\Requests\StoreKondisiUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKondisiUserRequest $request)
    {
        $request->validate([
        'kondisi' => 'required',
        'nilai' => 'required|integer|min:0|max:4'
        ]);

        KondisiUser::create($request->all());
        return back()->with('pesan', 'Kondisi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KondisiUser  $kondisiUser
     * @return \Illuminate\Http\Response
     */
    public function show(KondisiUser $kondisiUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KondisiUser  $kondisiUser
     * @return \Illuminate\Http\Response
     */
    public function edit(KondisiUser $kondisiUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKondisiUserRequest  $request
     * @param  \App\Models\KondisiUser  $kondisiUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKondisiUserRequest $request, KondisiUser $kondisiUser)
    {
        $request->validate([
            'kondisi' => 'required',
            'nilai' => 'required|integer|min:0|max:4'
        ]);

        $kondisiUser->update($request->all());

        return redirect()->route('kondisi.index')->with('pesan', '<div class="alert alert-info p-3 mt-3">Kondisi berhasil diperbarui.</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KondisiUser  $kondisiUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(KondisiUser $kondisiUser)
    {
        $kondisiUser->delete();

        return redirect()->route('kondisi.index')->with('pesan', '<div class="alert alert-danger p-3 mt-3">Kondisi berhasil dihapus.</div>');
    }
}
