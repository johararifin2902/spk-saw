<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria; // Perbaiki: Tambahkan tanda titik koma
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required|string|max:255',
            'bobot_kriteria' => 'required|numeric|min:0|max:1',
            'sifat_kriteria' => 'required|in:benefit,cost',
        ]);

        Kriteria::create($request->all());

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan!');
    }

    public function edit(Kriteria $kriteria)
    {
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        // Validasi data yang dikirim
        $request->validate([
            'nama_kriteria' => 'required|string|max:255',
            'bobot_kriteria' => 'required|numeric|min:0|max:1',
            'sifat_kriteria' => 'required|in:benefit,cost',
        ]);
    
        // Perbarui data kriteria
        $kriteria->update([
            'nama_kriteria' => $request->nama_kriteria,
            'bobot_kriteria' => $request->bobot_kriteria,
            'sifat_kriteria' => $request->sifat_kriteria,
        ]);
    
        // Redirect ke halaman indeks kriteria dengan pesan sukses
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diperbarui!');
    }
    

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus!');
    }
}
