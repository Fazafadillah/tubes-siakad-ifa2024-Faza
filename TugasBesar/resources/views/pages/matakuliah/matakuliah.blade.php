@extends('layouts.template')

@section('contens')
    <div class="container mt-3">
        <h1>Data Matakuliah</h1>
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
                <a href="{{ route('form-matkul') }}" class="btn btn-primary">
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
                        <th scope="col" class="text-center">Kode Matakuliah</th>
                        <th scope="col">Nama Mata Kuliah</th>
                        <th scope="col">SKS</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMatkul as $index => $item)
                        <tr>
                            <td scope="row" class="text-center">{{ $dataMatkul->firstItem() + $index }}</td>
                            <th scope="row" class="text-center">{{ $item->kode_matakuliah }}</th>
                            <td>{{ $item->nama_matakuliah }}</td>
                            <td>{{ $item->sks }}</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapus{{ $item->kode_matakuliah }}">
                                    Hapus
                                </button>
                                {{-- <button type="button" class="btn btn-danger">Hapus</button> --}}
                                {{-- <form action="{{ route('matkul.delete', $item->kode_matakuliah) }}" method="POST"
                                    style="display:inline;" onsubmit="return confirm('Yakin mau hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                </form> --}}
                                <a href="{{ route('form-edit-matkul', $item->kode_matakuliah) }}" class="btn btn-warning">
                                    Edit
                                </a>
                                <a href="{{ route('detail-matakuliah', ['kode_matakuliah' => $item->kode_matakuliah]) }}"
                                    class="btn btn-primary btn-sm"><i class="bi bi-eye"></i>
                                    Detail</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="hapus{{ $item->kode_matakuliah }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('matkul.delete', ['kode_matakuliah' => $item->kode_matakuliah]) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Mata Kuliah</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Matakuliah dengan Kode Matakuliah
                                            <strong>{{ $item->kode_matakuliah }}</strong>
                                            dan nama Matakuliah
                                            <strong>{{ $item->nama_matakuliah }}
                                                akan
                                                dihapus</strong>, apakah
                                            anda
                                            yakin?

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Hapus Matakuliah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            {{ $dataMatkul->links() }}
        </div>
    </div>
@endsection
