@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Daftar Basis Pengetahuan</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/basis/{{ $basis->id }}" class="mb-5">
        @method('put')
         @csrf
        <div class="mb-3">
            <input type="hidden" name="id" id="id" value="">
            <label for="kode" class="form-label">Kode Basis Pengetahuan</label>
            <input type="text" class="form-control" required autofocus value="{{ old('kode_basis_pengetahuan', $basis->kode_basis_pengetahuan) }}" name="kode_basis_pengetahuan" id="kode_basis_pengetahuan" placeholder="Kode Basis Pengetahuan" value="">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Penyakit</label>
            <select class="form-select" required value="{{$basis->kode_penyakit}}" name="kode_penyakit" id="kode_penyakit" placeholder="Kode Penyakit" required>
                @foreach($penyakits as $penyakit)
                    <option value="{{ $penyakit->kode_penyakit }}" {{($penyakit->kode_penyakit == $basis->kode_penyakit) ? 'selected' : ''}}>{{ $penyakit->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="detail" class="form-label">Gejala</label>
            <select class="form-select" required value="{{ $basis->kode_gejala }}" name="kode_gejala" id="kode_gejala" placeholder="Kode Gejala" required>
                @foreach ($gejalas as $gejala)
                    <option value="{{ $gejala->kode_gejala }}" {{($gejala->kode_gejala == $basis->kode_gejala) ? 'selected' : ''}}>{{ $gejala->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="mb" class="form-label">MB</label>
            <select class="form-select" required autofocus value="{{ $basis->mb }}" name="mb" id="mb" placeholder="MB" value="" required>
                <option value="" disabled>---  Pilih Nilai MB ---</option>
                <option value="0" {{("0" == $basis->mb) ? 'selected' : ''}}>0</option>
                <option value="0.2" {{("0.2" == $basis->mb) ? 'selected' : ''}}>0.2</option>
                <option value="0.4" {{("0.4" == $basis->mb) ? 'selected' : ''}}>0.4</option>
                <option value="0.6" {{("0.6" == $basis->mb) ? 'selected' : ''}}>0.6</option>
                <option value="0.8" {{("0.8" == $basis->mb) ? 'selected' : ''}}>0.8</option>
                <option value="1" {{("1" == $basis->mb) ? 'selected' : ''}}>1</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection