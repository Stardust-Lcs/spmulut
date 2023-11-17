@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Basis Pengetahuan</h1>
    </div>

    <div class="col-lg-8">      
        <form method="post" action="/dashboard/basis" class="mb-5">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="id" id="id" value="">
                <label for="kode" class="form-label">Kode Basis Pengetahuan</label>
                <input type="text" class="form-control " name="kode_basis_pengetahuan" id="kode_basis_pengetahuan" placeholder="Kode Basis Pengetahuan" value="">
            </div>
            <div class="mb-3">
                <label for="kode_penyakit" class="form-label">Penyakit</label>
                <select class="form-select" name="kode_penyakit" id="kode_penyakit" placeholder="Kode Penyakit" value="" required>
                    @foreach($penyakits as $penyakit)
                        <option value="{{ $penyakit->kode_penyakit }}">{{ $penyakit->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="kode_gejala" class="form-label">Gejala</label>
                <select class="form-select" name="kode_gejala" id="kode_gejala" placeholder="Kode Gejala" value="" required>
                    @foreach ($gejalas as $gejala)
                        <option value="{{ $gejala->kode_gejala }}">{{ $gejala->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="mb" class="form-label">MB</label>
                <select class="form-select" name="mb" id="mb" placeholder="MB" value="" required>
                    <option value="">---  Pilih Nilai MB ---</option>
                    <option value="0">0</option>
                    <option value="0.2">0.2</option>
                    <option value="0.4">0.4</option>
                    <option value="0.6">0.6</option>
                    <option value="0.8">0.8</option>
                    <option value="1">1</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection