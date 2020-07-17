<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Wali extends Model
{
    use LogsActivity;

    protected $table = 'tbl_wali', $guarded = [''];

    protected static $logUnguarded = true;

    public function siswa()
    {
        return $this->belongsTo('App\Wali', 'nik_ibu');
    }
}
