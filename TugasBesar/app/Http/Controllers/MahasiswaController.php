<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

use function Laravel\Prompts\alert;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $dataMhs = Mahasiswa::all();
        // $dataMhs = Mahasiswa::with('dosen')->get();
        // return view('pages.mahasiswa.mahasiswa  ', compact('dataMhs'));
        $dataMhs = Mahasiswa::find(1);
        $dataMhs = Dosen::with('dosen')->find(4);
        $search = $request->keyword;

        $dataMhs = Mahasiswa::with(['dosen'])
            ->when($search, function ($query, $search) {
                return $query->where('npm', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhereHas('dosen', function ($q) use ($search) {
                        $q->where('nama', 'like', "%{$search}%");
                    });
            })
            ->orderBy('npm', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('pages.mahasiswa.mahasiswa', compact('dataMhs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.mahasiswa.form-mhs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->nama);
        $validated = $request->validate([
            'npm' => 'required|numeric',
            'nidn' => 'required|numeric',
            'nama' => 'required',
        ]);
        // $validated['nidn'] = 1;
        Mahasiswa::create($validated);
        return redirect()->route('mahasiswa')->with('add', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detailmahasiswa = Mahasiswa::findOrFail($id);

        return view('pages.mahasiswa.detail-mahasiswa', compact('detailmahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $npm)
    {
        $dataMhs = Mahasiswa::where('npm', $npm)->firstOrFail();
        return view('pages.mahasiswa.form-edit-mhs', compact('dataMhs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $npm)
    {
        $validated = $request->validate([
            'npm' => 'required|numeric',
            'nidn' => 'required|numeric',
            'nama' => 'required',
        ]);
        // $validated['nidn'] = 1;
        Mahasiswa::where('npm', $npm)->update($validated);
        return redirect()->route('mahasiswa')->with('update', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $npm)
    {
        Mahasiswa::where('npm', $npm)->delete();

        return redirect()->route('mahasiswa')->with('delete', 'Data berhasil dihapus');
    }
}
