<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mapel', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mapel', 50);
            $table->integer('kelas');
            $table->string('gol', 5);
            $table->string('guru1', 25);
            $table->string('guru2', 25);
            $table->string('guru3', 25);
            $table->string('guru4', 25);
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
        Schema::dropIfExists('tbl_mapel');
    }
}
