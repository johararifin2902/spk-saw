<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriksKeputusansTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('matriks_keputusans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alternatif_id')
                  ->constrained('alternatifs') // Relasi ke tabel `alternatifs`
                  ->onDelete('cascade')        // Hapus data jika referensi dihapus
                  ->onUpdate('cascade');       // Update data jika referensi berubah
            
            $table->foreignId('kriteria_id')
                  ->constrained('kriterias')  // Relasi ke tabel `kriterias`
                  ->onDelete('cascade')       // Hapus data jika referensi dihapus
                  ->onUpdate('cascade');      // Update data jika referensi berubah
            
            $table->double('nilai');           // Nilai sub-kriteria
            $table->string('sub_kriteria_name')->nullable(); // Nama sub-kriteria (opsional)
            
            $table->timestamps(); // Kolom `created_at` dan `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('matriks_keputusans');
    }
}
