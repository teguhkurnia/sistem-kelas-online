<?php

use App\Absenmapel;
use App\Kas;
use App\Kelas;

function jumlah_siswa_perkelas($id_kelas)
{

    return Kelas::join('tbl_siswa', 'tbl_kelas.id', '=', 'tbl_siswa.kelas')->where('kelas', $id_kelas)->count();
}

function get_absen($nis, $mapel, $tgl, $bulan, $tahun)
{
    $cek = Absenmapel::with('siswa')->where([
        ['nis', $nis],
        ['mapel', $mapel],
        ['tgl', $tgl],
        ['bulan', $bulan],
        ['tahun', $tahun],
    ])->first('kehadiran');
    return $cek;
}

function checkKas($nama, $minggu, $bulan, $tahun)
{
    return Kas::where(['nama' => $nama, 'minggu' => $minggu, 'bulan' => $bulan, 'tahun' => $tahun])->first();
}
