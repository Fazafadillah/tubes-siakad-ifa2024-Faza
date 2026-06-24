@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Halaman Detail Dosen</h1>
        <div class="card">
            <div class="card-header">Detail Dosen</div>
            <div class="card-body">
                <p>NIDN Dosen : {{ $detaildosen->nidn }}</p>
                <p>Nama Dosen : {{ $detaildosen->nama }}</p>
            </div>
        </div>
    </div>
@endsection
