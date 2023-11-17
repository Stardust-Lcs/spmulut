<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class DashboardGejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gejala = Gejala::get();

        return view('dashboard.gejala.index', [
            'gejalas' => $gejala
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gejala.create');
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
            'kode_gejala' => 'required|unique:gejala|max:3|min:3',
            'nama' => 'required|max:255',
            'daftar_pertanyaan' => 'required|max:255'
        ]);

        // $validatedData['kode_penyakit'] = auth()->user()->id;

        Gejala::create($validatedData);
        return redirect('/dashboard/gejala')->with('Berhasil','Data sudah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function show(Gejala $gejala)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function edit(Gejala $gejala)
    {
        return view('dashboard.gejala.edit', [
            'gejala' => $gejala

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gejala $gejala)
    {
        $rules = ([
            'nama' => 'required|max:255',
            'daftar_pertanyaan' => 'required|max:255'
        ]);

        if ($request->kode_gejala != $gejala->kode_gejala) {
            $rules['slug'] = 'required|unique:gejala|max:3|min:3';
        }   

        $validatedData = $request->validate($rules);
        
        Gejala::where('id', $gejala->id)
            ->update($validatedData);
        return redirect('/dashboard/gejala')->with('Berhasil','Data sudah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gejala::where('id', $id)->delete();
        return redirect('/dashboard/gejala')->with('Berhasil', 'Data sudah berhasil dihapus!');
    }
}
