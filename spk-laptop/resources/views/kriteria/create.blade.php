@extends('layouts.app')

@section('title', 'Tambah Kriteria')

@section('content')
<div class="card shadow">
    <div class="card-header bg-success text-white">
        <h4>Tambah Kriteria</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('kriteria.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control rounded" required>
            </div>
            <div class="mb-3">
                <label for="bobot_kriteria" class="form-label">Bobot Kriteria</label>
                <input type="number" name="bobot_kriteria" id="bobot_kriteria" class="form-control rounded" step="0.01" min="0" max="1" required>
            </div>
            <div class="mb-3">
                <label for="sifat_kriteria" class="form-label">Sifat Kriteria</label>
                <select name="sifat_kriteria" id="sifat_kriteria" class="form-select rounded" required>
                    <option value="">Pilih Sifat</option>
                    <option value="benefit">Benefit</option>
                    <option value="cost">Cost</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection
