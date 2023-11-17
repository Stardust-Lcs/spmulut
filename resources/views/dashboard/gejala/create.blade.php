@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Daftar Gejala</h1>
    </div>

    <div class="col-lg-8">      
        <form method="post" action="/dashboard/gejala" class="mb-5">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="id" id="id" value="">
                <label for="kode" class="form-label">Kode Gejala</label>
                <input type="text" class="form-control " name="kode_gejala" id="kode_gejala" placeholder="Kode Gejala" value="">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Gejala</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Gejala" value="">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection