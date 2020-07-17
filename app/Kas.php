<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    protected $table = 'tbl_kas', $guarded = [];

    public function getKasTahunan($kelas, $tahun)
    {
        $kas = [];
        for ($i = 1; $i <= 12; $i++) {
            $aa = $this->where(['kelas' => $kelas, 'bulan' => $i, 'tahun' => $tahun])->get()->count() * 2000;
            array_push($kas, $aa);
        }
        return $kas;
    }

    public function getKasPerBulan($kelas, $bulan, $tahun)
    {
        return $this->where(['kelas' => $kelas, 'bulan' => $bulan, 'tahun' => $tahun])->get()->count() * 2000;
    }
}
