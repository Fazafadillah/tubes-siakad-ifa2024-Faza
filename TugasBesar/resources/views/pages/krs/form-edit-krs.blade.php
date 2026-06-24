@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Edit data KRS</h1>
        <div class="card">
            <div class="card-header">Edit KRS</div>
            <div class="card-body">
                <form method="POST" action="{{ route('krsupdate', $dataKRS->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">npm</label>
                        <input type="text" class="form-control" name="npm" value="{{ $dataKRS->npm }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kode Matakuliah</label>
                        <input type="text" class="form-control" name="kode_matakuliah"
                            value="{{ $dataKRS->kode_matakuliah }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
