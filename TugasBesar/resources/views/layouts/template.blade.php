<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Kelola Kampus</title>
    <style>
        .footer {
            position: absolute;
            bottom: 0;
            right: 0;
            height: 50px;
            line-height: 50px;
            background-color: #303030;
            color: white;
            width: 100%;
            text-align: center;

        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/dashboard') }} ">UNSUR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    @if (Auth::check() && Auth::user()->role == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/mahasiswa') }}">Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dosen') }}">Dosen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/jadwal') }}">Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/matkul') }}">Mata Kuliah</a>
                        </li>
                    @endif
                    @if (Auth::check() && Auth::user()->role == 'Mahasiswa')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/krs') }}">KRS</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('logout') }}">Logout</a>
                    </li>
                    {{-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> --}}
                </ul>
            </div>
        </div>
    </nav>

    @yield('contens')
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>
