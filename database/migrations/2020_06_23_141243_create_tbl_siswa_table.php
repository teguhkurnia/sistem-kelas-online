<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis_lokal', 20);
            $table->string('nisn', 20);
            $table->string('no_induk', 20);
            $table->string('nama_siswa', 100);
            $table->string('tempat_lahir', 50);
            $table->string('tgl_lahir', 20);
            $table->integer('kelas');
            $table->string('jk', 10);
            $table->string('agama', 15);
            $table->string('alamat', 100);
            $table->string('phone_ortuwali', 20);
            $table->string('foto', 50);
            $table->integer('jarak_rumahsekolah');
            $table->string('kendaraan', 20);
            $table->string('status_siswa', 20);
            $table->string('hobi', 20);
            $table->string('cita_cita', 20);
            $table->integer('jumlah_saudara');
            $table->string('nik_ayah', 20);
            $table->string('nik_ibu', 20);
            $table->string('nik_wali', 20);
            $table->string('no_kks', 20);
            $table->string('no_kph', 20);
            $table->string('no_kip', 20);
            $table->string('pid_status_penerima', 20);
            $table->string('pid_alasan_menerima', 20);
            $table->string('pid_periode', 20);
            $table->string('bidang_prestasi', 20);
            $table->string('tingkat_prestasi', 20);
            $table->string('tahun_prestasi', 20);
            $table->string('peringkat_prestasi', 20);
            $table->string('status_beasiswa', 20);
            $table->string('sumber_beasiswa', 30);
            $table->string('jenis_beasiswa', 20);
            $table->string('jangka_waktu_beasiswa', 20);
            $table->string('besar_uang_beasiswa', 20);
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
        Schema::dropIfExists('tbl_siswa');
    }
}
