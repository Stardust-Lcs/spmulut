@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Gejala</h1>
</div>

@if (session()->has('Berhasil'))
    <div class="alert alert-success" role="alert">
      {{ session('Berhasil') }}
    </div>
@endif

<div class="table-responsive">
  <a href="/dashboard/gejala/create" class="btn btn-primary mb-3">Buat Daftar Gejala</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kode Gejala</th>
          <th scope="col">Nama</th>
          <th scope="col">Pertanyaan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($gejalas as $gejala)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $gejala->kode_gejala }}</td>
          <td>{{ $gejala->nama }}</td> 
          <td>{{ $gejala->daftar_pertanyaan }}</td>
          <td>
            {{-- <a href="/dashboard/penyakit/{{ $penyakit->slug }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
            <a href="/dashboard/gejala/{{ $gejala->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/gejala/{{ $gejala->id }}" onclick="return confirm('Yakin delete?')" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button class="badge bg-danger border-0"><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
