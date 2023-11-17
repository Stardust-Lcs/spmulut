@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Daftar Penyakit</h1>
    </div>

    <div class="col-lg-8">      
        <form method="post" action="/dashboard/penyakit/{{ $penyakit->id }}" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <input type="hidden" name="id" id="id" value="">
                <label for="kode" class="form-label">Kode Penyakit</label>
                <input type="text" class="form-control" required autofocus value="{{ old('kode_penyakit', $penyakit->kode_penyakit) }}" name="kode_penyakit" id="kode_penyakit" placeholder="Kode Penyakit" value="">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Penyakit</label>
                <input type="text" class="form-control" required autofocus value="{{ old('nama', $penyakit->nama) }}" name="nama" id="nama" placeholder="Nama Penyakit" value="">
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Detail Penyakit</label>
                <input id="detail" type="hidden" name="detail" class="form-control" required autofocus value="{{ old('detail', $penyakit->detail) }}">
                <trix-editor input="detail"></trix-editor>
            </div>
            <div class="mb-3">
                <label for="saran" class="form-label">Saran</label>
                <input id="saran" type="hidden" name="saran" class="form-control" required autofocus value="{{ old('saran', $penyakit->saran) }}">
                <trix-editor input="saran"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection