@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Edit data Dosen</h1>
        <div class="card">
            <div class="card-header">Edit Dosen</div>
            <div class="card-body">
                <form method="POST" action="{{ route('dosenupdate', $dataDosen->nidn) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nidn</label>
                        <input type="text" class="form-control" name="nidn" value="{{ $dataDosen->nidn }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Dosen</label>
                        <input type="text" class="form-control" name="nama" value="{{ $dataDosen->nama }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
