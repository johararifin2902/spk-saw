@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="text-center">Cari Sub-Kriteria Berdasarkan Nama Kriteria</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('sub_kriteria.searchByName') }}" method="GET">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kriteria</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama kriteria..." required>
                </div>
                <button type="submit" class="btn btn-success">Cari</button>
            </form>
        </div>
    </div>
</div>
@endsection
