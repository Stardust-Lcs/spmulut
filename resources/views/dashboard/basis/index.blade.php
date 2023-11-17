@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Basis Pengetahuan</h1>
</div>

<div class="table-responsive">
  <a href="/dashboard/basis/create" class="btn btn-primary mb-3">Buat Daftar Basis Pengetahuan</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kode Basis Pengetahuan</th>
          <th scope="col">Kode Penyakit</th>
          <th scope="col">Kode Gejala</th>
          <th scope="col">MB</th>
          <th scope="col">Created at</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($basiss as $basis)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $basis->kode_basis_pengetahuan }}</td>
          <td>{{ $basis->kode_penyakit }}</td> 
          <td>{{ $basis->kode_gejala }}</td>
          <td>{{ $basis->mb }}</td>
          <td>{{ $basis->created_at }}</td>
          <td>
            {{-- <a href="/dashboard/penyakit/{{ $penyakit->slug }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
            <a href="/dashboard/basis/{{ $basis->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/basis/{{ $basis->id }}" onclick="return confirm('Yakin delete?')" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button class="badge bg-danger border-0"><span data-feather="x-circle"></span></button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection