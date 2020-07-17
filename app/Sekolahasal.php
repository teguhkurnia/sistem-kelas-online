<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolahasal extends Model
{
    protected $table = 'tbl_sekolahasal', $guarded = [''];

    public function Siswa()
    {
        return $this->belongsTo('App\Siswa', 'nis_lokal');
    }
}
