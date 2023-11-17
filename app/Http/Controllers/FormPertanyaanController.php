<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Basis;
use App\Models\Penyakit;
use App\Models\Riwayat;
use Illuminate\Http\Request;


class FormPertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function hitung_cf($data)
    // {
    //     $cf_old = 0;
    //     foreach ($data as $key => $value) {
    //         if($key === 0){
    //             $cf_old = $value['cf_hasil'];
    //         } else {
    //             $cf_old = $cf_old + $value['cf_hasil'] * (1 - $cf_old);
    //         }
    //     }
    //     return $cf_old;
    // }


    public function index()
    {
        $gejala = Gejala::get();
        
        return view('forms.form', [
            'gejalas' => $gejala,
            "title" => ""
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $UserInput = $request->all();
        
        //mengubah nilai string menjadi float
        $UserMB = array_map('floatval', $UserInput['UserMB']);
        
        $UserGejala = $UserInput['UserGejala'];
        $penyakit = Basis::select('kode_penyakit', 'kode_gejala', 'mb')->get()->toArray();        
        $penyakitGabungan = [];
        
        //grouping
        foreach ($penyakit as $baris){
            if(!array_key_exists($baris['kode_penyakit'], $penyakitGabungan)) {
                $penyakitGabungan[$baris['kode_penyakit']] = [];
            } 
            $penyakitGabungan[$baris['kode_penyakit']] [$baris['kode_gejala']] = $baris['mb'];
        }

        //perkalian MB
        $hasil_cf = [];
        foreach($penyakitGabungan as $kode_penyakit => $gejala) {
            foreach($gejala as $kode_gejala => $mb){
                $x = array_search($kode_gejala, $UserGejala);
                $mb = $UserMB[$x] * $mb;
                $penyakitGabungan[$kode_penyakit] [$kode_gejala] = $mb;
                $hasil_cf[$kode_penyakit] [$kode_gejala] = $mb;   
            }
        }

        foreach($penyakitGabungan as $penyakit => $gejala_array){
            $cf_combine = 0;
            $i = 0;
            $gejala_array = array_values($gejala_array);
            foreach($gejala_array as $gejala){
                if($i == 0){
                    $cf_combine = $gejala_array[$i] + $gejala_array[$i+1] * (1 - $gejala_array[$i]);
                }
                if($i>1){
                    $cf_combine = $cf_combine + $gejala_array[$i] * (1 - $cf_combine);
                }
                $i++;
            }
            $penyakitGabungan[$penyakit] = $cf_combine;
        }

        uasort($penyakitGabungan, function ($a, $b){
            return $b <=> $a;  
        });
        
        $maxKey = array_keys($penyakitGabungan);
        $key_cf1   = $maxKey[0];
        
        dd($penyakitGabungan);

        $qPenyakit = Penyakit::where('kode_penyakit', $key_cf1)->first(['detail', 'saran','nama','kode_penyakit']);

        $array_hasil = [];

        if(empty($array_hasil[$key_cf1])){
            $array_hasil[$key_cf1] = [
                'nama_penyakit'  => $qPenyakit['nama'],
                'detail' => $qPenyakit['detail'],
                'saran' => $qPenyakit['saran'],
            ];
            $hasil_diagnosa = $array_hasil[$key_cf1];
        }
        // dd($hasil_diagnosa);
       return view('forms.hasil', [
            "title" => "",
            'hasil_diagnosa' => $hasil_diagnosa,
            
        ]);

        // // dd($penyakitGabungan);
        // $maxKey = array_keys($penyakitGabungan);
        // $maxValue = array_values($penyakitGabungan);
        
        // $value_cf1  = $maxValue[0];
        // $round1      = round($value_cf1, 4);
        // $persentase = $round1 * 100;

        // // dd($persentase);
        // $key_cf1   = $maxKey[0];
        // $key_cf2   = $maxKey[1];

        // $qPenyakit = Penyakit::where('kode_penyakit', $key_cf1)->first(['detail', 'saran','nama','kode_penyakit']);

        // $array_hasil = [];

        // if(empty($array_hasil[$key_cf1])){
        //     $array_hasil[$key_cf1] = [
        //         'nama_penyakit'  => $qPenyakit['nama'],
        //         'kode_penyakit'  => $qPenyakit['kode_penyakit'],
        //         'detail' => $qPenyakit['detail'],
        //         'saran' => $qPenyakit['saran'],
        //         'nilai_diagnosa' => $persentase,
        //         'nilai_cf'      => $hasil_cf,
        //         'nilai_combine' =>  $penyakitGabungan
        //     ];
        //     $hasil_diagnosa = $array_hasil[$key_cf1];
        // }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *`
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gejala $gejala)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gejala $gejala)
    {
        //
    }
}
