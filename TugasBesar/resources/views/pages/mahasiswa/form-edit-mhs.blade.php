@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Edit data Mahasiswa</h1>
        <div class="card">
            <div class="card-header">Edit Mahasiswa</div>
            <div class="card-body">
                <form method="POST" action="{{ route('mahasiswaupdate', $dataMhs->npm) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">npm</label>
                        <input type="text" class="form-control" name="npm" value="{{ $dataMhs->npm }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Wali Dosen</label>
                        <input type="text" class="form-control" name="nidn" value="{{ $dataMhs->nidn }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" value="{{ $dataMhs->nama }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
