<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblIbuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ibu', function (Blueprint $table) {
            $table->id();
            $table->string('nik_ibu', 20);
            $table->string('nokk_ibu', 20);
            $table->string('kodepos_ibu', 15);
            $table->string('nama_ibu', 30);
            $table->date('tgllahir_ibu');
            $table->string('pendidikan_ibu', 20);
            $table->string('pekerjaan_ibu', 30);
            $table->string('penghasilan_ibu', 50);
            $table->string('alamat_ibu', 100);
            $table->string('provinsi_ibu', 30);
            $table->string('kabupaten_ibu', 30);
            $table->string('kecamatan_ibu', 30);
            $table->string('desa_ibu', 30);
            $table->timestamps();

            $table->foreign('nik_ibu')->reference('nik_ibu')->on('tbl_siswa')->onDeleted('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_ibu');
    }
}
