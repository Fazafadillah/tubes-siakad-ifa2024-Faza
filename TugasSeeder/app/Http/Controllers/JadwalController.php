<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Matakuliah;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $dataJadwal = Jadwal::all();
        // $dataJadwal = Jadwal::with(['dosen', 'matakuliah'])->get();
        // return view('pages.jadwal.jadwal', compact('dataJadwal'));
        $dataJadwal = Jadwal::find(1);
        $dataJadwal = Jadwal::with('dosen')->find(4);
        $dataJadwal = Jadwal::with('matakuliah')->find(4);
        $search = $request->keyword;

        $dataJadwal = Jadwal::with(['dosen', 'matakuliah'])
            ->when($search, function ($query, $search) {
                return $query->where('kode_matakuliah', 'like', "%{$search}%")
                    ->orWhere('kelas', 'like', "%{$search}%")
                    ->orWhere('hari', 'like', "%{$search}%")
                    ->orWhere('jam', 'like', "%{$search}%")
                    ->orWhereHas('matakuliah', function ($q) use ($search) {
                        $q->where('nama_matakuliah', 'like', "%{$search}%");
                    })

                    ->orWhereHas('dosen', function ($q) use ($search) {
                        $q->where('nidn', 'like', "%{$search}%");
                    });
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('pages.jadwal.jadwal', compact('dataJadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jadwal.form-jadwal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah',
            'nidn'            => 'required|exists:dosen,nidn',
            'kelas'           => 'required|in:A,B,C,D,E',
            'hari'            => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam'             => 'required|date',
        ]);
        // $validated['jam'] = now()->format('Y-m-d') . ' ' . $request->jam . ':00';
        $validated['jam'] = str_replace('T', ' ', $request->jam) . ':00';
        // $validated['nidn'] = 1;
        Jadwal::create($validated);
        return redirect()->route('jadwal')->with('add', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detailjadwal = Jadwal::findOrFail($id);

        return view('pages.jadwal.detail-jadwal', compact('detailjadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataJadwal = Jadwal::where('id', $id)->firstOrFail();
        return view('pages.jadwal.form-edit-jadwal', compact('dataJadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah',
            'nidn'            => 'required|exists:dosen,nidn',
            'kelas'           => 'required|in:A,B,C,D,E',
            'hari'            => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam'             => 'required|date',
        ]);
        $validated['jam'] = str_replace('T', ' ', $request->jam) . ':00';
        // $validated['id'] = 1;
        Jadwal::where('id', $id)->update($validated);
        return redirect()->route('jadwal')->with('update', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jadwal::where('id', $id)->delete();

        return redirect()->route('jadwal')->with('delete', 'Data berhasil dihapus');
    }
}
