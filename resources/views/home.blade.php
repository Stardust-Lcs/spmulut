@extends('layouts.main')

@section('container')
<div class="container-fluid banner">
        <style>
            h4 {margin-top: 20%;
                margin-bottom: 20px;
                background-color: aliceblue;
                color :navy ;
            }
            
            /* body {
                background-image: url(/images/mulut.jpg);
                background-position: center center;
                background-size: 100%;
                background-repeat: no-repeat;
                height: 100vh;
                width: 100%;
            } */
        </style>
    <div class="container text-center">
        <h4 class="display-6 font-weight-bolder">Selamat Datang di Website Konsultasi Penyakit Mulut</h4>
        <a href="/form">
            <button type="button" class="btn btn-lg btn btn-success">Konsultasi</button>
        </a>  
    </div>
</div>
@endsection