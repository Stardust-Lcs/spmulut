@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Daftar Pertanyaan</h1>
    </div>

    <div class="col-lg-8">      
        <form method="post" action="/dashboard/pertanyaan" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="kode_gejala" class="form-label">Kode Gejala</label>
                <select class="form-select" name="kode_gejala" id="kode_gejala" placeholder="Kode Gejala" value="" required>
                    @foreach ($gejalas as $gejala)
                        <option value="{{ $gejala->kode_gejala }}"></option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="kode_gejala" class="form-label">Nama Gejala</label>
                <select class="form-select" name="nama" id="nama" placeholder="Nama Gejala" value="" required>
                    @foreach ($gejalas as $gejala)
                        <option value="{{ $gejala->nama }}"></option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                <input type="text" class="form-control" name="daftar_pertanyaan" id="daftar_pertanyaan" placeholder="Pertanyaan" value="">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection