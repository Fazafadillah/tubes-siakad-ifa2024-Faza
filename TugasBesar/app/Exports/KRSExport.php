<?php

namespace App\Exports;

use App\Models\KRS;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KRSExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        if (Auth::user()->role == 'Mahasiswa') {
            $mhs = Mahasiswa::where('nama', Auth::user()->name)->first();
            $npm_login = $mhs ? $mhs->npm : '0';
            return KRS::with(['mahasiswa', 'matakuliah'])->where('npm', $npm_login)->get();
        }
        return KRS::with(['mahasiswa', 'matakuliah'])->get();
    }

    public function map($krs): array
    {
        return [
            $krs->id,
            $krs->mahasiswa->npm ?? '-',
            $krs->mahasiswa->nama ?? '-',
            $krs->matakuliah->kode_matakuliah ?? '-',
            $krs->matakuliah->nama_matakuliah ?? '-',
        ];
    }

    public function headings(): array
    {
        return ['ID KRS', 'NPM', 'Nama Mahasiswa', 'Kode Matkul', 'Nama Matkul'];
    }
}
