@extends('layouts.app')

@section('title', 'Edit Alternatif')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h4>Edit Alternatif</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
                    <input type="text" name="nama_alternatif" id="nama_alternatif" class="form-control" value="{{ $alternatif->nama_alternatif }}" required>
                </div>
                <div class="mb-3">
                    <label for="spesifikasi" class="form-label">Spesifikasi</label>
                    <input type="text" name="spesifikasi" id="spesifikasi" class="form-control" value="{{ $alternatif->spesifikasi }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
