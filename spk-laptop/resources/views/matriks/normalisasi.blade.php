@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Hasil Normalisasi</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        @foreach($kriterias as $kriteria)
                            <th>{{ $kriteria->nama_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($normalisasi as $alternatifId => $kriteriaData)
                        <tr>
                            <td>{{ $alternatifId }}</td>
                            @foreach($kriteriaData as $nilai)
                                <td>{{ round($nilai, 3) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
