<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $dataMatkul = Matakuliah::all();
        // return view('pages.matakuliah.matakuliah', compact('dataMatkul'));

        $dataMatkul = Matakuliah::find(1); //select * from buku where id=1

        $search = $request->keyword;

        $dataMatkul = Matakuliah::with([])
            ->when($search, function ($query, $search) {
                return $query->where('kode_matakuliah', 'like', "%{$search}%")
                    ->orWhere('nama_matakuliah', 'like', "%{$search}%");
            })
            ->orderBy('kode_matakuliah', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('pages.matakuliah.matakuliah', compact('dataMatkul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.matakuliah.form-matkul');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->kode_matakuliah);
        $validated = $request->validate([
            'kode_matakuliah' => 'required',
            'nama_matakuliah' => 'required',
            'sks' => 'required|numeric',
        ]);
        // $validated['kode_matakuliah'] = 1;
        Matakuliah::create($validated);
        return redirect()->route('matkul')->with('add', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detailmatakuliah = Matakuliah::findOrFail($id);

        return view('pages.matakuliah.detail-matakuliah', compact('detailmatakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_matakuliah)
    {
        $dataMatkul = Matakuliah::where('kode_matakuliah', $kode_matakuliah)->firstOrFail();
        return view('pages.matakuliah.form-edit-matkul', compact('dataMatkul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_matakuliah)
    {
        $validated = $request->validate([
            'kode_matakuliah' => 'required',
            'nama_matakuliah' => 'required',
            'sks => required|numeric'
        ]);
        // $validated['kode_matakuliah'] = 1;
        Matakuliah::where('kode_matakuliah', $kode_matakuliah)->update($validated);
        return redirect()->route('matkul')->with('update', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_matakuliah)
    {
        Matakuliah::where('kode_matakuliah', $kode_matakuliah)->delete();

        return redirect()->route('matkul')->with('delete', 'Data berhasil dihapus');
    }
}
