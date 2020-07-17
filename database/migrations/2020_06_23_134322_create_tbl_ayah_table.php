<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAyahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ayah', function (Blueprint $table) {
            $table->id();
            $table->string('nik_ayah', 20);
            $table->string('nokk_ayah', 20);
            $table->string('kodepos_ayah', 15);
            $table->string('nama_ayah', 30);
            $table->date('tgllahir_ayah');
            $table->string('pendidikan_ayah', 20);
            $table->string('pekerjaan_ayah', 30);
            $table->string('penghasilan_ayah', 50);
            $table->string('alamat_ayah', 100);
            $table->string('provinsi_ayah', 30);
            $table->string('kabupaten_ayah', 30);
            $table->string('kecamatan_ayah', 30);
            $table->string('desa_ayah', 30);
            $table->timestamps();

            $table->foreign('nik_ayah')->reference('nik_ayah')->on('tbl_siswa')->onDeleted('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_ayah');
    }
}
