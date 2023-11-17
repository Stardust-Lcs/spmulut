@extends('layouts.main')

@section('container')
<div class="card bg-success">
  <div class="card-header text-white">
    <h1>Hasil Diagnosa</h1>
  </div>
  <div class="card-body text-white">
    <p class="card-text font-weight-bold ">
        {{-- @foreach($detail_kerusakan as $i => $detail)
          - {{ $detail['nama_kerusakan'] }} | {{ round($detail['value'] * 100, 2) }}% ({{ $detail['value'] }})
          <br />
       @endforeach --}}
      <h2>{{$hasil_diagnosa['nama_penyakit']}}</h2>
      <h3>{{$hasil_diagnosa['detail']}}</h3>
      <br>
      <h2>Saran Pencegahan</h2>
      <h3>{{$hasil_diagnosa['saran']}}</h3>
    </p>
  </div>
</div>


@endsection
