@extends('layouts.app')

@section('title', 'Hasil Ranking')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Hasil Ranking</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>Ranking</th>
                        <th>Nama Alternatif</th>
                        <th>Hasil Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($results as $index => $result)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $result['alternatif'] }}</td>
                            <td>{{ number_format($result['score'], 4) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada data perhitungan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
