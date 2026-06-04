<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use Illuminate\Http\Request;

class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $dataKRS = KRS::all();
        // $dataKRS = KRS::with(['mahasiswa', 'matakuliah'])->get();
        // return view('pages.krs.krs', compact('dataKRS'));
        $dataKRS = KRS::find(1);
        $dataKRS = KRS::with('mahasiswa')->find(4);
        $dataKRS = KRS::with('matakuliah')->find(4);
        $search = $request->keyword;

        $dataKRS = KRS::with(['mahasiswa', 'matakuliah'])
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%")
                    ->orWhereHas('matakuliah', function ($q) use ($search) {
                        $q->where('kode_matakuliah', 'like', "%{$search}%");
                    })
                    ->orWhereHas('matakuliah', function ($q) use ($search) {
                        $q->where('nama_matakuliah', 'like', "%{$search}%");
                    })
                    ->orWhereHas('mahasiswa', function ($q) use ($search) {
                        $q->where('npm', 'like', "%{$search}%");
                    })

                    ->orWhereHas('mahasiswa', function ($q) use ($search) {
                        $q->where('nama', 'like', "%{$search}%");
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
        // dd($request->nama);
        $validated = $request->validate([
            'npm' => 'required|numeric',
            'kode_matakuliah' => 'required',
        ]);
        // $validated['nidn'] = 1;
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
    public function edit(string $id)
    {
        $dataKRS = KRS::where('id', $id)->firstOrFail();
        return view('pages.krs.form-edit-krs', compact('dataKRS'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'npm' => 'required|numeric',
            'kode_matakuliah' => 'required',
        ]);
        // $validated['nidn'] = 1;
        KRS::where('id', $id)->update($validated);
        return redirect()->route('krs')->with('update', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KRS::where('id', $id)->delete();

        return redirect()->route('krs')->with('delete', 'Data berhasil dihapus');
    }
}
