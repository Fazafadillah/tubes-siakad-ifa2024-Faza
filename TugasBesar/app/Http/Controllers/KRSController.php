<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\KRSExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $search = $request->keyword;

        $dataKRS = KRS::with(['mahasiswa', 'matakuliah'])
            ->when(Auth::user()->role == 'Mahasiswa', function ($query) {
                $mhs = Mahasiswa::where('nama', Auth::user()->name)->first();
                $npm_login = $mhs ? $mhs->npm : '0';

                return $query->where('npm', $npm_login);
            })
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('id', 'like', "%{$search}%")
                        ->orWhereHas('matakuliah', function ($q2) use ($search) {
                            $q2->where('kode_matakuliah', 'like', "%{$search}%");
                        })
                        ->orWhereHas('matakuliah', function ($q2) use ($search) {
                            $q2->where('nama_matakuliah', 'like', "%{$search}%");
                        })
                        ->orWhereHas('mahasiswa', function ($q2) use ($search) {
                            $q2->where('npm', 'like', "%{$search}%");
                        })
                        ->orWhereHas('mahasiswa', function ($q2) use ($search) {
                            $q2->where('nama', 'like', "%{$search}%");
                        });
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('pages.krs.krs', compact('dataKRS'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.krs.form-krs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role == 'Mahasiswa') {
            $validated = $request->validate([
                'kode_matakuliah' => 'required',
            ]);

            // Jembatan: Ambil NPM berdasarkan nama user
            $mhs = Mahasiswa::where('nama', Auth::user()->name)->first();
            $validated['npm'] = $mhs->npm;
        } else {
            // Admin tetap input NPM manual
            $validated = $request->validate([
                'npm' => 'required|numeric',
                'kode_matakuliah' => 'required',
            ]);
        }

        KRS::create($validated);
        return redirect()->route('krs')->with('add', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detailkrs = KRS::findOrFail($id);

        return view('pages.krs.detail-krs', compact('detailkrs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $dataKRS = KRS::where('id', $id)->firstOrFail();
    //     return view('pages.krs.form-edit-krs', compact('dataKRS'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     if (Auth::user()->role == 'Mahasiswa') {
    //         $validated = $request->validate([
    //             'kode_matakuliah' => 'required',
    //         ]);

    //         $mhs = Mahasiswa::where('nama', Auth::user()->name)->first();
    //         $validated['npm'] = $mhs->npm;
    //     } else {
    //         $validated = $request->validate([
    //             'npm' => 'required|numeric',
    //             'kode_matakuliah' => 'required',
    //         ]);
    //     }

    //     KRS::where('id', $id)->update($validated);
    //     return redirect()->route('krs')->with('update', 'Data berhasil diubah');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KRS::where('id', $id)->delete();

        return redirect()->route('krs')->with('delete', 'Data berhasil dihapus');
    }
    public function exportExcel()
    {
        return Excel::download(new KRSExport, 'Data_KRS.xlsx');
    }

    public function exportPdf()
    {
        if (Auth::user()->role == 'Mahasiswa') {
            $mhs = Mahasiswa::where('nama', Auth::user()->name)->first();
            $npm_login = $mhs ? $mhs->npm : '0';
            $dataKRS = KRS::with(['mahasiswa', 'matakuliah'])->where('npm', $npm_login)->get();
        } else {
            $dataKRS = KRS::with(['mahasiswa', 'matakuliah'])->get();
        }

        $pdf = Pdf::loadView('pages.krs.pdf', compact('dataKRS'));
        return $pdf->download('Laporan_Data_KRS.pdf');
    }
}
