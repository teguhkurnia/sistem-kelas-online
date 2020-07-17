<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_guru', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 25);
            $table->string('nuptk', 25);
            $table->string('nama_guru', 50);
            $table->string('nik', 25);
            $table->string('no_npwp', 25);
            $table->string('nama_npwp', 25);
            $table->string('kewarganegaraan', 25);
            $table->string('pernikahan', 15);
            $table->string('tempat_lahir', 30);
            $table->date('tgllahir_guru');
            $table->string('jk', 15);
            $table->string('agama', 15);
            $table->string('foto', 50);
            $table->string('nama_ibu', 50);
            $table->string('nip_suamiistri', 25);
            $table->string('nama_suamiistri', 50);
            $table->string('pekerjaan_suamiistri', 30);
            $table->string('jenjang_pendidikan', 15);
            $table->integer('kelompok_prodi');
            $table->string('alamat', 100);
            $table->string('provinsi_guru', 20);
            $table->string('kabupaten_guru', 30);
            $table->string('kecamatan_guru', 30);
            $table->string('desa_guru', 30);
            $table->integer('kode_pos');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('no_hp', 20);
            $table->string('status_kepegawaian', 25);
            $table->string('no_niy', 25);
            $table->string('jenis_ptk', 25);
            $table->string('sk_pengangkatan', 25);
            $table->string('tgl_pengangkatan', 25);
            $table->string('lembaga_pengangkat', 25);
            $table->string('sk_cpns', 25);
            $table->string('tgl_cpns', 15);
            $table->string('tgl_pns', 15);
            $table->string('golongan', 15);
            $table->string('sumber_gaji', 15);
            $table->string('no_kartupegawai', 15);
            $table->string('kartu_istrisuami', 15);
            $table->string('telp_rumah', 15);
            $table->string('email', 15);
            $table->string('nama_bank', 15);
            $table->string('rekening', 15);
            $table->string('atas_nama', 20);
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
        Schema::dropIfExists('tbl_guru');
    }
}
