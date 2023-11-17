@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Diagnosa</h1>
    </div>
    
    <div class="table-responsive">
      <form method="post" action="" class="mb-5">
        @csrf
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col">Jawaban</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($gejalas as $gejala)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $gejala->daftar_pertanyaan }}</td>
                <td><select class="form-select" name="UserMB[]" id="UserMB" placeholder="Jawaban" value="" required>
                  <option value="">---  Pilih Jawaban ---</option>
                  <option value="0">Tidak</option>
                  <option value="0.2">Tidak Tahu</option>
                  <option value="0.4">Sedikit Yakin</option>
                  <option value="0.6">Cukup Yakin</option>
                  <option value="0.8">Yakin</option>
                  <option value="1">Sangat Yakin</option>
                  </select>
                <input value="{{$gejala->kode_gejala}}" name="UserGejala[]" hidden>
                </td> 
              </tr>
              @endforeach
            </tbody>
          </table>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
@endsection
