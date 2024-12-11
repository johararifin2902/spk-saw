@extends('layouts.app')

@section('title', 'Edit Sub-Kriteria')

@section('content')
<div class="card shadow">
    <div class="card-header bg-warning text-white">
        <h4>Edit Sub-Kriteria</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('sub_kriteria.update', $subKriteria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kriteria_id" class="form-label">Kriteria</label>
                <select name="kriteria_id" id="kriteria_id" class="form-select rounded" required>
                    <option value="">Pilih Kriteria</option>
                    @foreach ($kriterias as $kriteria)
                        <option value="{{ $kriteria->id }}" {{ $subKriteria->kriteria_id == $kriteria->id ? 'selected' : '' }}>
                            {{ $kriteria->nama_kriteria }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_sub_kriteria" class="form-label">Nama Sub-Kriteria</label>
                <input type="text" name="nama_sub_kriteria" id="nama_sub_kriteria" class="form-control rounded" 
                       value="{{ old('nama_sub_kriteria', $subKriteria->nama_sub_kriteria) }}" required>
            </div>
            <div class="mb-3">
                <label for="bobot_sub_kriteria" class="form-label">Bobot Sub-Kriteria</label>
                <input type="number" name="bobot_sub_kriteria" id="bobot_sub_kriteria" class="form-control rounded"
                       value="{{ old('bobot_sub_kriteria', $subKriteria->bobot_sub_kriteria) }}" required min="1">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2">Update</button>
                <a href="{{ route('sub_kriteria.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
