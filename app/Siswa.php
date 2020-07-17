<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Siswa extends Model
{
    use LogsActivity;

    protected $table = 'tbl_siswa';
    protected $guarded = ['id'];

    protected static $logUnguarded = true, $logOnlyDirty = true;

    public function absenmapel()
    {
        return $this->hasMany('App\Absenmapel', 'nis', 'nis_lokal');
    }

    public function ayah()
    {
        return $this->hasOne('App\Ayah', 'nik', 'nik_ayah');
    }

    public function ibu()
    {
        return $this->hasOne('App\Ibu', 'nik', 'nik_ibu');
    }

    public function sekolahasal()
    {
        return $this->hasOne('App\Sekolahasal', 'nis_siswa', 'nis_lokal');
    }

    public function wali()
    {
        return $this->hasOne('App\Wali', 'nik', 'nik_wali');
    }
}
