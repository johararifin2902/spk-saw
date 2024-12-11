@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="text-center">Hasil Pencarian Sub-Kriteria</h4>
        </div>
        <div class="card-body">
            @if (!$kriteria)
                <p class="text-danger">Kriteria dengan nama <strong>{{ $query }}</strong> tidak ditemukan.</p>
            @else
                <p><strong>Kriteria:</strong> {{ $kriteria->nama_kriteria }}</p>

                @if ($subKriterias->isEmpty())
                    <p class="text-danger">Tidak ada sub-kriteria untuk kriteria ini.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Sub-Kriteria</th>
                                <th>Bobot Sub-Kriteria</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subKriterias as $subKriteria)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subKriteria->nama_sub_kriteria }}</td>
                                    <td>{{ $subKriteria->bobot_sub_kriteria }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            @endif

            <a href="{{ route('sub_kriteria.searchByName') }}" class="btn btn-primary">Cari Lagi</a>
        </div>
    </div>
</div>
@endsection
