@extends('layouts.app')

@section('title', 'Daftar Alternatif')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <h4>Daftar Alternatif</h4>
        </div>
        <div class="card-body">
        <div class="card-body">
            <a href="{{ route('alternatif.create') }}" class="btn btn-success mb-3">+ Tambah Alternatif</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Alternatif</th>
                        <th>Spesifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($alternatifs as $alternatif)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alternatif->nama_alternatif }}</td>
                        <td>{{ $alternatif->spesifikasi }}</td>
                        <td>
                            <a href="{{ route('alternatif.edit', $alternatif->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('alternatif.destroy', $alternatif->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada alternatif yang ditambahkan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
