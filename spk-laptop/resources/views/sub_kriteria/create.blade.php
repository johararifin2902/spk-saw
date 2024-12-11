@extends('layouts.app')

@section('title', 'Tambah Sub-Kriteria')

@section('content')
<div class="card shadow">
    <div class="card-header bg-success text-white">
        <h4>Tambah Sub-Kriteria</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('sub_kriteria.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kriteria_id" class="form-label">Kriteria</label>
                <select name="kriteria_id" id="kriteria_id" class="form-select rounded" required>
                    <option value="">Pilih Kriteria</option>
                    @foreach ($kriterias as $kriteria)
                        <option value="{{ $kriteria->id }}">{{ $kriteria->nama_kriteria }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_sub_kriteria" class="form-label">Nama Sub-Kriteria</label>
                <input type="text" name="nama_sub_kriteria" id="nama_sub_kriteria" class="form-control rounded" required>
            </div>
            <div class="form-group">
                <label for="bobot_sub_kriteria">Bobot Sub-Kriteria</label>
                <input type="number" name="bobot_sub_kriteria" id="bobot_sub_kriteria" class="form-control"
                    value="{{ old('bobot_sub_kriteria', $subKriteria->bobot_sub_kriteria ?? '') }}" required min="1">
            </div>
            
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection
