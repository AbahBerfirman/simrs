<?php

namespace App\Http\Controllers;

use App\Models\DataKelurahan;
use App\Models\DataPasien;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DataPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pasien.index', [
            'pasien'    => DataPasien::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create', [
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
        // ddd($request->all());

        $validatedData = $request->validate([
            // 'id'            => IdGenerator::generate(['table' => 'data_pasiens', 'length' => 10, 'prefix' => date('ym')]),
            'nama'          => 'required',
            'alamat'        => 'required',
            'no_telp'       => 'required',
            'rtrw'          => 'required',
            'kelurahan_id'  => 'required',
            'ttl'           => 'required',
            'jenis_kelamin' => 'required',
        ]);

        // $validatedData['id'] = IdGenerator::generate(['table' => 'data_pasiens', 'length' => 10, 'prefix' => date('ym')]);

        DataPasien::create($validatedData);

        return redirect('/data-pasien')->with('success', 'New data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DataPasien $dataPasien)
    {
        return view('pasien.show', [
            'pasien' => $dataPasien,
            'kelurahan'    => DataKelurahan::all(),
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPasien $dataPasien)
    {
        return view('pasien.edit', [
            'pasien' => $dataPasien,
            'kelurahan'    => DataKelurahan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPasien $dataPasien)
    {
        $rules = [
            'nama'          => 'required',
            'alamat'        => 'required',
            'no_telp'       => 'required',
            'rtrw'          => 'required',
            'kelurahan_id'  => 'required',
            'ttl'           => 'required',
            'jenis_kelamin' => 'required',
        ];

        $validatedData = $request->validate($rules);

        DataPasien::where('id', $dataPasien->id)
            ->update($validatedData);

        return redirect('/data-pasien')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPasien $dataPasien)
    {
        DataPasien::destroy($dataPasien->id);

        return redirect('/data-pasien')->with('success', 'Data has been deleted!');
    }
}
