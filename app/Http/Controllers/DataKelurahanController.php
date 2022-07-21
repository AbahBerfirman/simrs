<?php

namespace App\Http\Controllers;

use App\Models\DataKelurahan;
use Illuminate\Http\Request;

class DataKelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kelurahan.index', [
            'kelurahan'    => DataKelurahan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelurahan.create', [
            'kelurahan'    => DataKelurahan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelurahan'    => 'required',
            'nama_kecamatan'    => 'required',
            'nama_kota'         => 'required',
        ]);

        DataKelurahan::create($validatedData);

        return redirect('/data-kelurahan')->with('success', 'New data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DataKelurahan $dataKelurahan)
    {
        return view('kelurahan.show', [
            'kelurahan' => $dataKelurahan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DataKelurahan $dataKelurahan)
    {
        return view('kelurahan.edit', [
            'kelurahan' => $dataKelurahan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataKelurahan  $dataKelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataKelurahan $dataKelurahan)
    {
        $rules = [
            'nama_kelurahan'    => 'required',
            'nama_kecamatan'    => 'required',
            'nama_kota'         => 'required',
        ];

        $validatedData = $request->validate($rules);

        DataKelurahan::where('id', $dataKelurahan->id)
            ->update($validatedData);

        return redirect('/data-kelurahan')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataKelurahan  $dataKelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataKelurahan $dataKelurahan)
    {
        DataKelurahan::destroy($dataKelurahan->id);

        return redirect('/data-kelurahan')->with('success', 'Data has been deleted!');
    }
}
