<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Ayah extends Model
{
    use LogsActivity;

    protected $table = 'tbl_ayah', $guarded = [''];

    protected static $logUnguarded = true;

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'nik');
    }
}
