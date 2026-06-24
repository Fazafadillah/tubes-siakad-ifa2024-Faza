@extends('layouts.template')

@section('contens')
    <div class="container mt-4">
        <h2 class="mb-4 fw-bold">Dashboard {{ Auth::user()->name }} Akademik</h2>

        @if (Auth::user()->role == 'Admin')
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-primary shadow border-0 rounded-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-people-fill me-2"></i>Mahasiswa</h5>
                            <h2 class="card-text fw-bold">{{ $totalMahasiswa }}</h2>
                            <small>Total Mahasiswa Terdaftar</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-success shadow border-0 rounded-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-person-badge-fill me-2"></i>Dosen</h5>
                            <h2 class="card-text fw-bold">{{ $totalDosen }}</h2>
                            <small>Total Dosen Pengajar</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-dark bg-warning shadow border-0 rounded-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-book-half me-2"></i>Mata Kuliah</h5>
                            <h2 class="card-text fw-bold">{{ $totalMatkul }}</h2>
                            <small>Total Mata Kuliah Tersedia</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-info shadow border-0 rounded-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-card-checklist me-2"></i>KRS Terinput</h5>
                            <h2 class="card-text fw-bold">{{ $totalKRS }}</h2>
                            <small>Total Data Transaksi KRS</small>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->role == 'Mahasiswa')
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card text-white bg-info shadow border-0 rounded-3 h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title"><i class="bi bi-journal-bookmark-fill me-2"></i>Mata Kuliah Diambil</h5>
                            <h1 class="card-text fw-bold display-4">{{ $totalKRSKu }} <span
                                    class="fs-5 fw-normal">Matkul</span></h1>
                            <a href="{{ url('/krs') }}"
                                class="text-white text-decoration-none mt-auto pt-3 border-top border-light border-opacity-25">
                                Kelola KRS Saya <i class="bi bi-arrow-right-circle ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <div class="card shadow border-0 rounded-3 h-100">
                        <div class="card-body">
                            <h4 class="card-title text-primary fw-bold mb-3">Selamat Datang, {{ Auth::user()->name }}!</h4>
                            <p class="card-text text-secondary lh-lg">
                                Ini adalah halaman dashboard Sistem Informasi Akademik. Anda masuk sebagai
                                <strong>Mahasiswa</strong>.
                                Gunakan navigasi di atas untuk melihat jadwal dan mengelola Kartu Rencana Studi (KRS) Anda
                                pada semester ini.
                            </p>
                            <div class="alert alert-warning mt-4 border-0" role="alert">
                                <i class="bi bi-info-circle-fill me-2"></i> Pastikan untuk selalu memeriksa kesesuaian mata
                                kuliah yang Anda ambil dengan jadwal perkuliahan agar tidak terjadi bentrok.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
