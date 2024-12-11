<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatriksKeputusan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'matriks_keputusans';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['alternatif_id', 'kriteria_id', 'nilai', 'sub_kriteria_name'];

    // Relasi ke tabel alternatif
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    // Relasi ke tabel kriteria
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
