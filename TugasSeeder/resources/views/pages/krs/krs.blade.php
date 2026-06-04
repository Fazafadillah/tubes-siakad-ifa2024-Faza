@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Data KRS</h1>
        @if (session('add'))
            <div class="alert alert-success alert-dismissible fade show"">
                {{ session('add') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('update'))
            <div class="alert alert-success alert-dismissible fade show"">
                {{ session('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-success alert-dismissible fade show"">
                {{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="card p-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ route('form-krs') }}" class="btn btn-primary">
                    Add
                </a>

                <form class="d-flex">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input name="keyword" type="text" class="form-control" placeholder="Cari data">
                        <button class="btn btn-success" type="submit">Cari</button>
                    </div>
                </form>
            </div>

            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">ID KRS</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Npm</th>
                        <th scope="col">Kode Mata Kuliah</th>
                        <th scope="col">Nama Mata Kuliah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataKRS as $index => $item)
                        <tr>
                            <td scope="row" class="text-center">{{ $dataKRS->firstItem() + $index }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->mahasiswa->nama }}</td>
                            <td>{{ $item->npm }}</td>
                            <td>{{ $item->kode_matakuliah }}</td>
                            <td>{{ $item->matakuliah->nama_matakuliah }}</td>
                            <td>
                                {{-- <button type="button" class="btn btn-danger">Hapus</button> --}}
                                <form action="{{ route('krs.delete', $item->id) }}" method="POST" style="display:inline;"
                                    onsubmit="return confirm('Yakin mau hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                </form>
                                <a href="{{ route('form-edit-krs', $item->id) }}" class="btn btn-warning">
                                    Edit
                                </a>
                                <a href="{{ route('detail-krs', ['id' => $item->id]) }}" class="btn btn-primary btn-sm"><i
                                        class="bi bi-eye"></i>
                                    Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $dataKRS->links() }}
        </div>
    </div>
@endsection
