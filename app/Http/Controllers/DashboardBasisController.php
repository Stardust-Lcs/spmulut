<?php

namespace App\Http\Controllers;

use App\Models\Basis;
use App\Models\Penyakit;
use App\Models\Gejala;
use Illuminate\Http\Request;

class DashboardBasisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basis = Basis::get();
        return view('dashboard.basis.index', [
            'basiss' => $basis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penyakit = Penyakit::get();
        $gejala = Gejala::get();
        return view('dashboard.basis.create',[
            'penyakits' => $penyakit,
            'gejalas' => $gejala
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
            'kode_basis_pengetahuan' => 'required|unique:basis|max:4|min:3',
            'kode_penyakit' => 'required|max:3|min:3|',
            'kode_gejala' => 'required|max:3|min:3|',
            'mb' => 'required',
        ]);
        
        // if ($request->kode_basis_pengetahuan != $basis->kode_basis_pengetahuan) {
        //     $rules['slug'] = 'required|unique:penyakit|max:3|min:3';
        // }  

        // $validatedData['kode_penyakit'] = auth()->user()->id;

        Basis::create($validatedData);
        return redirect('/dashboard/basis')->with('Berhasil','Data sudah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basis  $basis
     * @return \Illuminate\Http\Response
     */
    public function show(Basis $basis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basis  $basis
     * @return \Illuminate\Http\Response
     */
    public function edit(Basis $basi)
    {
        $penyakits = Penyakit::get();
        $gejalas = Gejala::get();
        return view('dashboard.basis.edit', [
            'basis' => $basi,
            'gejalas' => $gejalas,
            'penyakits' => $penyakits
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basis  $basis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basis $basis)
    {
        $rules = ([
            'kode_penyakit' => 'required|max:3|min:3|',
            'kode_gejala' => 'required|max:3|min:3|',
            'mb' => 'required',
        ]);

        if ($request->kode_basis != $basis->kode_basis) {
            $rules['slug'] = 'required|unique:basis|max:3|min:3';
        }   

        $validatedData = $request->validate($rules);
        
        Gejala::where('id', $basis->id)
            ->update($validatedData);
        return redirect('/dashboard/gejala')->with('Berhasil','Data sudah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basis  $basis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Basis::where('id', $id)->delete();
        return redirect('/dashboard/basis')->with('Berhasil', 'Data sudah berhasil dihapus!');
    }
}
