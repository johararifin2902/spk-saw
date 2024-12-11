<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $subKriterias = SubKriteria::with('kriteria')->get();
        return view('sub_kriteria.index', compact('subKriterias'));
    }

    public function create()
    {
        $kriterias = Kriteria::all();
        return view('sub_kriteria.create', compact('kriterias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'nama_sub_kriteria' => 'required|string|max:255',
            'bobot_sub_kriteria' => 'required|numeric|min:1', // Hanya minimal 1, tanpa batas maksimum
        ]);
    
        SubKriteria::create($validated);
    
        return redirect()->route('sub_kriteria.index')->with('success', 'Sub-Kriteria berhasil ditambahkan!');
    }
    
    

    public function edit(SubKriteria $subKriteria)
    {
        $kriterias = Kriteria::all();
        return view('sub_kriteria.edit', compact('subKriteria', 'kriterias'));
    }

    public function update(Request $request, SubKriteria $subKriteria)
    {
        $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'nama_sub_kriteria' => 'required|string|max:255',
            'bobot_sub_kriteria' => 'required|numeric|min:1', // Pastikan aturan sesuai kebutuhan
        ]);
    
        // Perbarui data
        $subKriteria->update($request->only(['kriteria_id', 'nama_sub_kriteria', 'bobot_sub_kriteria']));
    
        return redirect()->route('sub_kriteria.index')->with('success', 'Sub-Kriteria berhasil diperbarui!');
    }
    
    
    

    public function destroy(SubKriteria $subKriteria)
    {
        $subKriteria->delete();

        return redirect()->route('sub_kriteria.index')->with('success', 'Sub-Kriteria berhasil dihapus!');
    }
    public function getSubKriterias($kriteria_id)
    {
        $subKriterias = SubKriteria::where('kriteria_id', $kriteria_id)->get();
    
        if ($subKriterias->isEmpty()) {
            return response()->json(['message' => 'Sub-kriteria tidak ditemukan'], 404);
        }
    
        return response()->json($subKriterias);
    }
    
    public function search()
{
    $kriterias = Kriteria::all(); // Mengambil data kriteria untuk dropdown
    return view('sub_kriteria.search', compact('kriterias'));
}
public function searchByName(Request $request)
{
    $query = $request->get('name');

    // Cari kriteria berdasarkan nama
    $kriteria = Kriteria::where('nama_kriteria', 'LIKE', "%$query%")->first();

    if (!$kriteria) {
        return view('sub_kriteria.search_results', [
            'subKriterias' => collect(),
            'query' => $query,
            'kriteria' => null,
        ]);
    }

    // Cari sub-kriteria berdasarkan kriteria yang ditemukan
    $subKriterias = SubKriteria::where('kriteria_id', $kriteria->id)->get();

    return view('sub_kriteria.search_results', [
        'subKriterias' => $subKriterias,
        'query' => $query,
        'kriteria' => $kriteria,
    ]);
}

public function searchResults(Request $request)
{
    $request->validate([
        'kriteria_id' => 'required|exists:kriterias,id',
        'nilai' => 'required|numeric|min:0|max:1',
    ]);

    // Ambil data sub-kriteria sesuai filter
    $subKriterias = SubKriteria::where('kriteria_id', $request->kriteria_id)
                                ->where('bobot_sub_kriteria', $request->nilai)
                                ->get();

    $kriteria = Kriteria::find($request->kriteria_id);

    return view('sub_kriteria.search_results', compact('subKriterias', 'kriteria', 'request'));
}


}
