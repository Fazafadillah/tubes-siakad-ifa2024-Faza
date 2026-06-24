@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Halaman Detail Mata Kuliah</h1>
        <div class="card">
            <div class="card-header">Detail Mata Kuliah</div>
            <div class="card-body">
                <p>Kode Mata Kuliah : {{ $detailmatakuliah->kode_matakuliah }}</p>
                <p>Nama Mata Kuliah : {{ $detailmatakuliah->nama_matakuliah }}</p>
                <p>SKS : {{ $detailmatakuliah->sks }}</p>
            </div>
        </div>
    </div>
@endsection
