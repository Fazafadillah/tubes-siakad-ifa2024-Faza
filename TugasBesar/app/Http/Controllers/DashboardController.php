<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\KRS;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == 'Admin') {
            $totalMahasiswa = Mahasiswa::count();
            $totalDosen = Dosen::count();
            $totalMatkul = Matakuliah::count();
            $totalKRS = KRS::count();

            return view('pages.dashboard', compact('totalMahasiswa', 'totalDosen', 'totalMatkul', 'totalKRS'));
        } elseif ($role == 'Mahasiswa') {
            $mhs = Mahasiswa::where('nama', Auth::user()->name)->first();
            $npm_login = $mhs ? $mhs->npm : '0';

            $totalKRSKu = KRS::where('npm', $npm_login)->count();

            return view('pages.dashboard', compact('totalKRSKu'));
        }
    }
}
