@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h4>Tambah Alternatif</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('alternatif.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
                <input type="text" name="nama_alternatif" id="nama_alternatif" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="spesifikasi" class="form-label">Spesifikasi</label>
                <textarea name="spesifikasi" id="spesifikasi" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection
