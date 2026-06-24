@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Tambah data Mahasiswa</h1>
        <div class="card">
            <div class="card-header">Tambah Mahasiswa</div>
            <div class="card-body">
                <form method="POST" action="{{ route('mahasiswastore') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">npm</label>
                        <input type="text" class="form-control" name="npm">
                        @error('npm')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Wali Dosen</label>
                        <input type="text" class="form-control" name="nidn">
                        @error('nidn')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama">
                        @error('nama')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
