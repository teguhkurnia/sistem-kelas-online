<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absenmapel extends Model
{
    protected $table = 'tbl_absen', $guarded = [];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'nis', 'nis_lokal');
    }
}
