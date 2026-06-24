@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Tambah data Mata Kuliah</h1>
        <div class="card">
            <div class="card-header">Tambah Mata Kuliah</div>
            <div class="card-body">
                <form method="POST" action="{{ route('matkulstore') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kode Matakuliah</label>
                        <input type="text" class="form-control" name="kode_matakuliah">
                        @error('kode_matakuliah')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama_matakuliah">
                        @error('nama_matakuliah')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SKS</label>
                        <input type="text" class="form-control" name="sks">
                        @error('sks')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
