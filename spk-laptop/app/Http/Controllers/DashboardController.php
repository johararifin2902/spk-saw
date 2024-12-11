<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Alternatif;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        // Menghitung jumlah data untuk ditampilkan di dashboard
        $kriteriaCount = Kriteria::count();
        $subKriteriaCount = SubKriteria::count();
        $alternatifCount = Alternatif::count();

        // Mengirim data ke view dashboard
        return view('dashboard', compact('kriteriaCount', 'subKriteriaCount', 'alternatifCount'));
    }
}
