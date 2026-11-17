<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Jenjang;
use App\Models\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function index(Request $request)
{
    $kelas = Kelas::with(['jenjang', 'jurusan'])
        ->when($request->search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_kelas', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%")

                  ->orWhereHas('jenjang', function ($j) use ($search) {
                      $j->where('nama_jenjang', 'like', "%{$search}%");
                  })

                  ->orWhereHas('jurusan', function ($j) use ($search) {
                      $j->where('nama_jurusan', 'like', "%{$search}%");
                  });
            });
        })
        ->paginate(10);

    return view('kelas.index', compact('kelas'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenjangs = Jenjang::all();
        $jurusans = Jurusan::all();

        return view('kelas.create', compact('jenjangs', 'jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kelas' => 'required|string|max:50',
            'jenjang_id' => 'required|exists:jenjangs,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        Kelas::create($data);

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $jenjangs = Jenjang::all();
        $jurusans = Jurusan::all();

        return view('kelas.edit', compact('kelas', 'jenjangs', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $data = $request->validate([
            'nama_kelas' => 'required|string|max:50',
            'jenjang_id' => 'required|exists:jenjangs,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        $kelas->update($data);

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->delete();

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}
