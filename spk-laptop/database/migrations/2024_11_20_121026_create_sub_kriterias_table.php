<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sub_kriterias', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('kriteria_id') // Relasi ke tabel kriterias
                  ->constrained('kriterias') 
                  ->onDelete('cascade') // Hapus sub-kriteria jika kriteria dihapus
                  ->onUpdate('cascade'); // Perbarui jika ID kriteria berubah

            $table->string('nama_sub_kriteria'); // Nama sub-kriteria
            $table->float('bobot_sub_kriteria'); // Bobot nilai sub-kriteria
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('sub_kriterias');
    }
}
