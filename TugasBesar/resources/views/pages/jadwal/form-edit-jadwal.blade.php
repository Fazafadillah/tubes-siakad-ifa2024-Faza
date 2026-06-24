@extends('layouts.template')

@section('contens')
<div class="container mt-3">
    <h1>Edit Jadwal</h1>

    <div class="card">
        <div class="card-header">Edit Jadwal</div>

        <div class="card-body">
            <form method="POST" action="{{ route('jadwalupdate', $dataJadwal->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Kode Matakuliah</label>
                    <input type="text" name="kode_matakuliah" class="form-control"
                        value="{{ old('kode_matakuliah', $dataJadwal->kode_matakuliah) }}">
                    @error('kode_matakuliah')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>NIDN</label>
                    <input type="text" name="nidn" class="form-control"
                        value="{{ old('nidn', $dataJadwal->nidn) }}">
                    @error('nidn')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Kelas</label>
                    <select name="kelas" class="form-control">
                        @foreach (['A','B','C','D','E'] as $k)
                            <option value="{{ $k }}"
                                {{ old('kelas', $dataJadwal->kelas) == $k ? 'selected' : '' }}>
                                {{ $k }}
                            </option>
                        @endforeach
                    </select>
                    @error('kelas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Hari</label>
                    <select name="hari" class="form-control">
                        @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $h)
                            <option value="{{ $h }}"
                                {{ old('hari', $dataJadwal->hari) == $h ? 'selected' : '' }}>
                                {{ $h }}
                            </option>
                        @endforeach
                    </select>
                    @error('hari')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Jam</label>
                    <input type="datetime-local" name="jam" class="form-control"
                        value="{{ old('jam', \Carbon\Carbon::parse($dataJadwal->jam)->format('Y-m-d\TH:i')) }}">
                    @error('jam')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection