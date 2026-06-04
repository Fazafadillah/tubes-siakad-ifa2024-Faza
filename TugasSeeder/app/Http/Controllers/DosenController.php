<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $dataDosen = Dosen::all();
        // return view('pages.dosen.dosen', compact('dataDosen'));

        #cara pertama
        #detail buku dari buku
        $dataDosen = Dosen::find(1); //select * from buku where id=1
        //dd($buku->detail->isbn);

        // $dataDosen = Dosen::with('detail')->find(4);
        //dd($buku->detail->isbn ?? '-');

        $search = $request->keyword;

        $dataDosen = Dosen::with([])
            ->when($search, function ($query, $search) {
                return $query->where('nidn', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%");
            })
            ->orderBy('nidn', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('pages.dosen.dosen', compact('dataDosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dosen.form-dosen');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->nidn);
        $validated = $request->validate([
            'nidn' => 'required|numeric',
            'nama' => 'required',
        ]);
        // $validated['nidn'] = 1;
        Dosen::create($validated);
        return redirect()->route('dosen')->with('add', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detaildosen = Dosen::findOrFail($id);

        return view('pages.dosen.detail-dosen', compact('detaildosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nidn)
    {
        $dataDosen = Dosen::where('nidn', $nidn)->firstOrFail();
        return view('pages.dosen.form-edit-dosen', compact('dataDosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nidn)
    {
        $validated = $request->validate([
            'nidn' => 'required|numeric',
            'nama' => 'required',
        ]);
        // $validated['nidn'] = 1;
        Dosen::where('nidn', $nidn)->update($validated);
        return redirect()->route('dosen')->with('update', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nidn)
    {
        Dosen::where('nidn', $nidn)->delete();

        return redirect()->route('dosen')->with('delete', 'Data berhasil dihapus');
    }
}
