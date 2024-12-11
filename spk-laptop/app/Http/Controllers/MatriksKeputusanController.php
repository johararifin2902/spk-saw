<?php

namespace App\Http\Controllers;

use App\Models\MatriksKeputusan;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class MatriksKeputusanController extends Controller
{
    public function index(Request $request)
    {
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::all();
        $subKriterias = null;
    
        if ($request->has('kriteria_id')) {
            $subKriterias = SubKriteria::where('kriteria_id', $request->kriteria_id)->get();
        }
    
        // Ambil semua data matriks keputusan
        $matriksKeputusans = MatriksKeputusan::with('alternatif', 'kriteria')->get();
    
        return view('matriks.index', compact('kriterias', 'alternatifs', 'subKriterias', 'matriksKeputusans'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'alternatif_id' => 'required|exists:alternatifs,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'nilai' => 'required|numeric|min:1', // Hanya minimal 1
        ]);
    
        MatriksKeputusan::create([
            'alternatif_id' => $request->alternatif_id,
            'kriteria_id' => $request->kriteria_id,
            'nilai' => $request->nilai,
        ]);
    
        return redirect()->route('matriks.index')->with('success', 'Data berhasil disimpan!');
    }
    
    public function edit($id)
{
    $matriks = MatriksKeputusan::findOrFail($id);
    $kriterias = Kriteria::all();
    $alternatifs = Alternatif::all();
    return view('matriks.edit', compact('matriks', 'kriterias', 'alternatifs'));
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'alternatif_id' => 'required|exists:alternatifs,id',
        'kriteria_id' => 'required|exists:kriterias,id',
        'nilai' => 'required|numeric|min:1',
    ]);

    // Ambil data matriks yang akan diupdate
    $matriks = MatriksKeputusan::findOrFail($id);

    // Cari nama sub-kriteria berdasarkan nilai dan kriteria
    $subKriteriaName = SubKriteria::where('bobot_sub_kriteria', $request->nilai)
        ->where('kriteria_id', $request->kriteria_id)
        ->value('nama_sub_kriteria');

    // Update data matriks
    $matriks->update([
        'alternatif_id' => $request->alternatif_id,
        'kriteria_id' => $request->kriteria_id,
        'nilai' => $request->nilai,
        'sub_kriteria_name' => $subKriteriaName,
    ]);

    return redirect()->route('matriks.index')->with('success', 'Data berhasil diperbarui!');
}


public function destroy($id)
{
    $matriks = MatriksKeputusan::findOrFail($id);
    $matriks->delete();

    return redirect()->route('matriks.index')->with('success', 'Data berhasil dihapus!');
}
public function normalisasi()
{
    // Logika normalisasi di sini
    $kriterias = Kriteria::all();
    $matriks = MatriksKeputusan::all();

    // Normalisasi matriks
    $normalisasi = [];

    foreach ($kriterias as $kriteria) {
        $nilaiMax = $matriks->where('kriteria_id', $kriteria->id)->max('nilai');
        $nilaiMin = $matriks->where('kriteria_id', $kriteria->id)->min('nilai');

        foreach ($matriks->where('kriteria_id', $kriteria->id) as $data) {
            $normalisasi[$data->alternatif_id][$data->kriteria_id] =
                $kriteria->sifat_kriteria == 'benefit'
                    ? $data->nilai / $nilaiMax
                    : $nilaiMin / $data->nilai;
        }
    }

    return view('matriks.normalisasi', compact('normalisasi', 'kriterias'));
}

public function ranking()
{
    $kriterias = Kriteria::all();
    $alternatifs = Alternatif::all();
    $matriks = MatriksKeputusan::all();

    // Normalisasi Matriks
    $normalized = [];
    foreach ($kriterias as $kriteria) {
        $nilaiMax = $matriks->where('kriteria_id', $kriteria->id)->max('nilai');
        $nilaiMin = $matriks->where('kriteria_id', $kriteria->id)->min('nilai');

        foreach ($matriks->where('kriteria_id', $kriteria->id) as $data) {
            $normalized[$data->alternatif_id][$data->kriteria_id] =
                $kriteria->sifat_kriteria == 'benefit'
                    ? $data->nilai / $nilaiMax
                    : $nilaiMin / $data->nilai;
        }
    }

    // Hitung Total Ranking
    $rankings = [];
    foreach ($alternatifs as $alternatif) {
        $total = 0;
        foreach ($kriterias as $kriteria) {
            $total += ($normalized[$alternatif->id][$kriteria->id] ?? 0) * $kriteria->bobot_kriteria;
        }
        $rankings[$alternatif->id] = $total;
    }

    // Urutkan Ranking
    arsort($rankings);

    // Gabungkan hasil ranking dengan nama alternatif
    $results = [];
    foreach ($rankings as $id => $score) {
        $results[] = [
            'alternatif' => $alternatifs->find($id)->nama_alternatif,
            'score' => $score,
        ];
    }

    return view('matriks.ranking', compact('results'));
}



}
