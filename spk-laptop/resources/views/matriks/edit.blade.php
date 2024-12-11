@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4 class="text-center">Edit Matriks Keputusan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('matriks.update', $matriks->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="alternatif_id" class="form-label">Alternatif</label>
                    <select name="alternatif_id" id="alternatif_id" class="form-control" required>
                        @foreach ($alternatifs as $alternatif)
                            <option value="{{ $alternatif->id }}" {{ $matriks->alternatif_id == $alternatif->id ? 'selected' : '' }}>
                                {{ $alternatif->nama_alternatif }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kriteria_id" class="form-label">Kriteria</label>
                    <select name="kriteria_id" id="kriteria_id" class="form-control" required>
                        @foreach ($kriterias as $kriteria)
                            <option value="{{ $kriteria->id }}" {{ $matriks->kriteria_id == $kriteria->id ? 'selected' : '' }}>
                                {{ $kriteria->nama_kriteria }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nilai" class="form-label">Nilai</label>
                    <input type="number" name="nilai" id="nilai" class="form-control" step="1" value="{{ $matriks->nilai }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
