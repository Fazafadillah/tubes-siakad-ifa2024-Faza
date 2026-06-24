@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Halaman Detail KRS</h1>
        <div class="card">
            <div class="card-header">Detail KRS</div>
            <div class="card-body">
                <p>Nama Mahasiswa : {{ $detailkrs->mahasiswa->nama }}</p>
                <p>NPM : {{ $detailkrs->npm }}</p>
                <p>Nama Matakuliah : {{ $detailkrs->matakuliah->nama_matakuliah }}</p>
                <p>Kode Matakuliah : {{ $detailkrs->kode_matakuliah }}</p>
                <p>SKS : {{ $detailkrs->matakuliah->sks }} sks</p>
            </div>
        </div>
    </div>
@endsection
