@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Edit data Mata Kuliah</h1>
        <div class="card">
            <div class="card-header">Edit Mata Kuliah</div>
            <div class="card-body">
                <form method="POST" action="{{ route('matkulupdate', $dataMatkul->kode_matakuliah) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Kode Matakuliah</label>
                        <input type="text" class="form-control" name="kode_matakuliah"
                            value="{{ $dataMatkul->kode_matakuliah }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Matakuliah</label>
                        <input type="text" class="form-control" name="nama_matakuliah"
                            value="{{ $dataMatkul->nama_matakuliah }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">SKS</label>
                        <input type="text" class="form-control" name="sks" value="{{ $dataMatkul->sks }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
