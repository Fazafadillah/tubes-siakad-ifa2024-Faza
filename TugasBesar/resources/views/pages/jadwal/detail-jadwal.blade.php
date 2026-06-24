@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Halaman Detail Jadwal</h1>
        <div class="card">
            <div class="card-header">Detail Jadwal</div>
            <div class="card-body">
                <p>Nama Mata Kuliah : {{ $detailjadwal->matakuliah->nama_matakuliah }}</p>
                <p>Kode Mata Kuliah : {{ $detailjadwal->kode_matakuliah }}</p>
                <p>Nama Dosen : {{ $detailjadwal->dosen->nama }}</p>
                <p>Kelas : {{ $detailjadwal->kelas }}</p>
                <p>Hari : {{ $detailjadwal->hari }}</p>
                <p>Jam : {{ $detailjadwal->jam }}</p>
            </div>
        </div>
    </div>
@endsection
