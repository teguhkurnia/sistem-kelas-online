<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblWaliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_wali', function (Blueprint $table) {
            $table->id();
            $table->string('nik_wali', 20);
            $table->string('nokk_wali', 20);
            $table->string('kodepos_wali', 15);
            $table->string('nama_wali', 30);
            $table->date('tgllahir_wali');
            $table->string('pendidikan_wali', 20);
            $table->string('pekerjaan_wali', 30);
            $table->string('penghasilan_wali', 50);
            $table->string('alamat_wali', 100);
            $table->string('provinsi_wali', 30);
            $table->string('kabupaten_wali', 30);
            $table->string('kecamatan_wali', 30);
            $table->string('desa_wali', 30);
            $table->timestamps();

            $table->foreign('nik_wali')->reference('nik_wali')->on('tbl_siswa')->onDeleted('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_wali');
    }
}
