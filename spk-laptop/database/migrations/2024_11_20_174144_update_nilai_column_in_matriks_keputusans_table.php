<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNilaiColumnInMatriksKeputusansTable extends Migration
{
    public function up()
    {
        Schema::table('matriks_keputusans', function (Blueprint $table) {
            $table->integer('nilai')->change(); // Ubah ke integer
        });
    }

    public function down()
    {
        Schema::table('matriks_keputusans', function (Blueprint $table) {
            $table->double('nilai')->change(); // Kembalikan ke double jika rollback
        });
    }
}
