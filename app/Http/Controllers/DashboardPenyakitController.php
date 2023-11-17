<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class DashboardPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyakit = Penyakit::get();

        return view('dashboard.penyakit.index', [
            'penyakits' => $penyakit
        ]);
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');   
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.penyakit.create');
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
            'kode_penyakit' => 'required|unique:penyakit|max:3|min:3',
            'nama' => 'required|max:255',
            'detail' => 'required',
            'saran' => 'required|max:255',
        ]);

        // $validatedData['kode_penyakit'] = auth()->user()->id;

        Penyakit::create($validatedData);
        return redirect('/dashboard/penyakit')->with('Berhasil','Data sudah berhasil ditambahkan!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function show(Penyakit $penyakit)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyakit $penyakit)
    {
        return view('dashboard.penyakit.edit', [
            'penyakit' => $penyakit

        ]);

        // return view('dashboard.penyakit.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyakit $penyakit)
    {      
        $rules = ([
            // 'kode_penyakit' => 'required|unique:penyakit|max:3|min:3',
            'nama' => 'required|max:255',
            'detail' => 'required|max:1000',
            'saran' => 'required|max:1000',
        ]);

        if ($request->kode_penyakit != $penyakit->kode_penyakit) {
            $rules['slug'] = 'required|unique:penyakit|max:3|min:3';
        }   

        $validatedData = $request->validate($rules);
        
        Penyakit::where('id', $penyakit->id)
            ->update($validatedData);
        return redirect('/dashboard/penyakit')->with('Berhasil','Data sudah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penyakit::where('id', $id)->delete();
        return redirect('/dashboard/penyakit')->with('Berhasil', 'Data sudah berhasil dihapus!');
    }
}
