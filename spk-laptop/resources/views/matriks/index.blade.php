@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <h4 class="text-center">Matriks Keputusan</h4>
        </div>
        <div class="card-body">
            <!-- Form Pilihan Kriteria -->
            <form action="{{ route('matriks.index') }}" method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="kriteria_id" class="form-label">Kriteria</label>
                        <select name="kriteria_id" id="kriteria_id" class="form-control" required>
                            <option value="">Pilih Kriteria</option>
                            @foreach ($kriterias as $kriteria)
                                <option value="{{ $kriteria->id }}" {{ request('kriteria_id') == $kriteria->id ? 'selected' : '' }}>
                                    {{ $kriteria->nama_kriteria }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Pilih Kriteria</button>
                    </div>
                </div>
            </form>

            <!-- Form Tambah Matriks -->
            @if(isset($subKriterias))
            <form action="{{ route('matriks.store') }}" method="POST">
                @csrf
                <!-- Hidden Field untuk kriteria_id -->
                <input type="hidden" name="kriteria_id" value="{{ request('kriteria_id') }}">
                <div class="row">
                    <div class="col-md-4">
                        <label for="alternatif_id" class="form-label">Alternatif</label>
                        <select name="alternatif_id" id="alternatif_id" class="form-control" required>
                            @foreach ($alternatifs as $alternatif)
                                <option value="{{ $alternatif->id }}">{{ $alternatif->nama_alternatif }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="nilai" class="form-label">Nilai</label>
                        <select name="nilai" id="nilai" class="form-control" required>
                            <option value="">Pilih Nilai</option>
                            @foreach ($subKriterias as $subKriteria)
                                <option value="{{ $subKriteria->bobot_sub_kriteria }}">
                                    {{ $subKriteria->nama_sub_kriteria }} ({{ $subKriteria->bobot_sub_kriteria }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
            @endif
            @if($matriksKeputusans->isNotEmpty())
<div class="mt-4">
    <h5>Data Matriks Keputusan</h5>
    <table class="table table-striped table-bordered">
        <thead class="table-success">
            <tr>
                <th>#</th>
                <th>Alternatif</th>
                <th>Kriteria</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matriksKeputusans as $matriks)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $matriks->alternatif->nama_alternatif }}</td>
                <td>{{ $matriks->kriteria->nama_kriteria }}</td>
                <td>{{ $matriks->nilai }}</td>
                <td>
                    <a href="{{ route('matriks.edit', $matriks->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('matriks.destroy', $matriks->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<p class="text-muted">Belum ada data matriks keputusan.</p>
@endif

        </div>
    </div>
</div>
@endsection
