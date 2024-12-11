@extends('layouts.app')

@section('title', 'Kriteria')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header">
            <h4>Daftar Kriteria</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('kriteria.create') }}" class="btn btn-success mb-3">+ Tambah Kriteria</a>
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Sifat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kriterias as $kriteria)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kriteria->nama_kriteria }}</td>
                            <td>{{ $kriteria->bobot_kriteria }}</td>
                            <td>{{ ucfirst($kriteria->sifat_kriteria) }}</td>
                            <td>
                                <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data kriteria</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
