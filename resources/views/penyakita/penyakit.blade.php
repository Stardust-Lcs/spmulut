@extends('layouts.main')

@section('container')
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Penyakit</th>
            <th scope="col">Detail Penyakit</th>
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
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection