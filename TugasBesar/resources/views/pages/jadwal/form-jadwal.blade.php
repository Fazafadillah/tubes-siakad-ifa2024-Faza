@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Tambah data Jadwal</h1>

        <div class="card">
            <div class="card-header">Tambah Jadwal</div>

            <div class="card-body">
                <form method="POST" action="{{ route('jadwalstore') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Kode Matakuliah</label>
                        <input type="text" class="form-control" name="kode_matakuliah"
                            value="{{ old('kode_matakuliah') }}">
                        @error('kode_matakuliah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dosen (NIDN)</label>
                        <input type="text" class="form-control" name="nidn" value="{{ old('nidn') }}">
                        @error('nidn')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select name="kelas" class="form-control">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach (['A', 'B', 'C', 'D', 'E'] as $k)
                                <option value="{{ $k }}" {{ old('kelas') == $k ? 'selected' : '' }}>
                                    {{ $k }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <select name="hari" class="form-control">
                            <option value="">-- Pilih Hari --</option>
                            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $h)
                                <option value="{{ $h }}" {{ old('hari') == $h ? 'selected' : '' }}>
                                    {{ $h }}
                                </option>
                            @endforeach
                        </select>
                        @error('hari')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jam</label>
                        <input type="datetime-local" name="jam" class="form-control" value="{{ old('jam') }}">
                        @error('jam')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">Jam</label>
                        <input type="time" class="form-control" name="jam" value="{{ old('jam') }}">
                        @error('jam')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
