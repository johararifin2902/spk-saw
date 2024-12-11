@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <h4>Daftar Sub Kriteria</h4>
        </div>
        <div class="card-body">
        <div class="card-body">
            <a href="{{ route('sub_kriteria.create') }}" class="btn btn-success mb-3">+ Tambah Sub Kriteria</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kriteria</th>
                        <th>Nama Sub-Kriteria</th>
                        <th>Bobot</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subKriterias as $subKriteria)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subKriteria->kriteria->nama_kriteria }}</td>
                            <td>{{ $subKriteria->nama_sub_kriteria }}</td>
                            <td>{{ $subKriteria->bobot_sub_kriteria }}</td>
                            <td>
                                <a href="{{ route('sub_kriteria.edit', $subKriteria->id) }}" class="btn btn-warning btn-sm rounded-btn">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </a>
                                <form action="{{ route('sub_kriteria.destroy', $subKriteria->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-btn">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
