<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = ['nama_alternatif', 'spesifikasi'];

    public function matriksKeputusan()
    {
        return $this->hasMany(MatriksKeputusan::class);
    }
}
