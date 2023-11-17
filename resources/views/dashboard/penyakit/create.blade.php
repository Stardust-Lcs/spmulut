@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Daftar Penyakit</h1>
    </div>

    <div class="col-lg-8">      
        <form method="post" action="/dashboard/penyakit" class="mb-5">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="id" id="id" value="">
                <label for="kode" class="form-label">Kode Penyakit</label>
                <input type="text" class="form-control " name="kode_penyakit" id="kode_penyakit" placeholder="Kode Penyakit" value="">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Penyakit</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Penyakit" value="">
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Detail Penyakit</label>
                <input id="detail" type="hidden" name="detail" class="form-control" value="">
                <trix-editor input="detail"></trix-editor>
            </div>
            <div class="mb-3">
                <label for="saran" class="form-label">Saran</label>
                <input id="saran" type="hidden" name="saran" class="form-control" value="">
                <trix-editor input="saran"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection