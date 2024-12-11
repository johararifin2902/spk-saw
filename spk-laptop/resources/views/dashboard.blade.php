@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card mb-4 shadow-sm">
        <div class="card-body text-center">
            <h3>Dashboard</h3>
            <p class="text-muted">Sistem Pendukung Keputusan untuk Memilih Laptop Terbaik</p>
        </div>
    </div>

    <div class="row g-3">
        <!-- Kriteria -->
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fa-solid fa-list fa-3x text-success mb-3"></i>
                    <h4>{{ $kriteriaCount ?? 0 }}</h4>
                    <p>Kriteria</p>
                    <a href="{{ route('kriteria.index') }}" class="btn btn-success rounded-btn">Lihat Kriteria</a>
                </div>
            </div>
        </div>

        <!-- Sub-Kriteria -->
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fa-solid fa-list-alt fa-3x text-info mb-3"></i>
                    <h4>{{ $subKriteriaCount ?? 0 }}</h4>
                    <p>Sub-Kriteria</p>
                    <a href="{{ route('sub_kriteria.index') }}" class="btn btn-info rounded-btn">Lihat Sub-Kriteria</a>
                </div>
            </div>
        </div>

        <!-- Alternatif -->
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fa-solid fa-laptop fa-3x text-primary mb-3"></i>
                    <h4>{{ $alternatifCount ?? 0 }}</h4>
                    <p>Alternatif</p>
                    <a href="{{ route('alternatif.index') }}" class="btn btn-primary rounded-btn">Lihat Alternatif</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
