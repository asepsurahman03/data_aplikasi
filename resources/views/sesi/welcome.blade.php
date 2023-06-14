@extends('layout/aplikasi')

@section('konten')
    <div class="w-50 text-center border rounded px-3 py-3 mx-auto align-items-center">
        <div class="pb-5">
            <img style="max-width:400px; max-height:400px" class="mx-auto d-block" src="{{ url('assets/img/logo diskominfo.png')}}" alt="Diskominfo Kota Sukabumi">
        </div>
        {{-- <h1>Selamat Da</h1> --}}
        <p class="fw-semibold">Silakan login atau register untuk masuk</p>
        <a href="/sesi" class="btn btn-primary btn-lg">LOGIN</a>
        <a href="/sesi/register" class="btn btn-success btn-lg">REGISTER</a> 
    </div>
@endsection