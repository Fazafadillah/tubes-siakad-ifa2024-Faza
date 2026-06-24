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
            {{-- <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ route('form-krs') }}" class="btn btn-primary">
                    Add
                </a>
                <a href="{{ route('krs.pdf') }}" class="btn btn-danger">
                    pdf
                </a>
                <a href="{{ route('krs.excel') }}" class="btn btn-success">
                    excel
                </a>
                <form class="d-flex">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input name="keyword" type="text" class="form-control" placeholder="Cari data">
                        <button class="btn btn-success" type="submit">Cari</button>
                    </div>
                </form>
            </div> --}}
            <div class="card-header d-flex justify-content-between align-items-center">

                <div class="d-flex gap-2">
                    <a href="{{ route('form-krs') }}" class="btn btn-primary btn-sm">
                        Tambah Data
                    </a>
                    <a href="{{ route('krs.pdf') }}" class="btn btn-danger btn-sm">
                        Export PDF
                    </a>
                    <a href="{{ route('krs.excel') }}" class="btn btn-success btn-sm">
                        Export Excel
                    </a>
                </div>

                <form class="d-flex">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input name="keyword" type="text" class="form-control" placeholder="Cari data">
                        <button class="btn btn-success" type="submit">Cari</button>
                    </div>

            </div>

            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">ID KRS</th>
                        {{-- <th scope="col">Nama Mahasiswa</th> --}}
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
                            {{-- <td>{{ $item->mahasiswa->nama }}</td> --}}
                            <td>{{ $item->npm }}</td>
                            <td>{{ $item->kode_matakuliah }}</td>
                            <td>{{ $item->matakuliah->nama_matakuliah }}</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapus{{ $item->id }}">
                                    Hapus
                                </button>
                                {{-- <button type="button" action="{{ route('krs.delete', $item->id) }}"
                                    class="btn btn-danger">Hapus</button> --}}
                                {{-- <form action="{{ route('krs.delete', $item->id) }}" method="POST" style="display:inline;"
                                    onsubmit="return confirm('Yakin mau hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                </form> --}}
                                {{-- <a href="{{ route('form-edit-krs', $item->id) }}" class="btn btn-warning">
                                    Edit
                                </a> --}}
                                <a href="{{ route('detail-krs', ['id' => $item->id]) }}" class="btn btn-primary btn-sm"><i
                                        class="bi bi-eye"></i>
                                    Detail</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('krs.delete', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Drop Data Matakuliah</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Mata Kuliah <strong>{{ $item->matakuliah->kode_matakuliah }} </strong>
                                            dan nama Mata Kuliah <strong>{{ $item->matakuliah->nama_matakuliah }}
                                                <strong> akan
                                                    didrop</strong>, apakah
                                                anda
                                                yakin drop Mata Kuliah?

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Drop Matakuliah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            {{ $dataKRS->links() }}
        </div>
    </div>
@endsection
