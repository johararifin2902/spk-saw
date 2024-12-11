@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="text-center">Edit Kriteria</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                    <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" 
                           value="{{ old('nama_kriteria', $kriteria->nama_kriteria) }}" required>
                </div>
                <div class="mb-3">
                    <label for="bobot_kriteria" class="form-label">Bobot Kriteria</label>
                    <input type="number" step="0.01" name="bobot_kriteria" id="bobot_kriteria" class="form-control" 
                           value="{{ old('bobot_kriteria', $kriteria->bobot_kriteria) }}" required>
                </div>
                <div class="mb-3">
                    <label for="sifat_kriteria" class="form-label">Sifat Kriteria</label>
                    <select name="sifat_kriteria" id="sifat_kriteria" class="form-control" required>
                        <option value="benefit" {{ old('sifat_kriteria', $kriteria->sifat_kriteria) == 'benefit' ? 'selected' : '' }}>Benefit</option>
                        <option value="cost" {{ old('sifat_kriteria', $kriteria->sifat_kriteria) == 'cost' ? 'selected' : '' }}>Cost</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Perbarui</button>
                <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
