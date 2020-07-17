<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSekolahasalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sekolahasal', function (Blueprint $table) {
            $table->id();
            $table->string('nis_siswa', 20);
            $table->string('nisn', 20);
            $table->string('sekolah_asal', 30);
            $table->string('jenis_sekolahasal', 20);
            $table->string('status_sekolahasal', 20);
            $table->string('kabupaten_sekolahasal', 30);
            $table->string('no_ujiansebelumnya', 20);
            $table->string('npsn_sekolahasal', 20);
            $table->string('blanko_skhunasal', 20);
            $table->string('no_ijazahasal', 20);
            $table->string('nilai_un', 5);
            $table->string('tgl_kelulusan', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sekolahasal');
    }
}
