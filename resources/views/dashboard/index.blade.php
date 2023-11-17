@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Penyakit</h1>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Penyakit</th>
          <th scope="col">Penjelasan</th>
          <th scope="col">Saran</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($penyakits as $penyakit)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $penyakit->nama }}</td>
          <td>{{ $penyakit->detail }}</td> 
          <td>{{ $penyakit->saran }}</td>
          <td>{{ $penyakit->created_at }}</td>
          <td>
            {{-- <a href="/dashboard/penyakit/{{ $penyakit->slug }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
            <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
            <a href="" class="badge bg-danger"><span data-feather="x-circle"></span></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection