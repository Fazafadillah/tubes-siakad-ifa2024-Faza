@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Halaman Detail Mahasiswa</h1>
        <div class="card">
            <div class="card-header">Detail Mahasiswa</div>
            <div class="card-body">
                <p>NPM Mahasiswa : {{ $detailmahasiswa->npm }}</p>
                <p>Wali Dosen : {{ $detailmahasiswa->dosen->nama }}</p>
                <p>Nama Mahasiswa : {{ $detailmahasiswa->nama }}</p>
            </div>
        </div>
    </div>
@endsection
