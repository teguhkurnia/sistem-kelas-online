<?php

namespace App\Http\Controllers;

use App\Absenmapel;
use App\Kelas;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index($kelas = 8)
    {
        $absen = Absenmapel::where(['kelas' => $kelas, 'tgl' => date('j'), 'bulan' => date('n'), 'tahun' => date('Y')])->get(['kehadiran', 'nis']);
        $sakit = $absen->where('kehadiran', 3);
        $terlambat = $absen->where('kehadiran', 2);
        $izin = $absen->where('kehadiran', 4);
        $alpa = $absen->where('kehadiran', 5);
        $kelassekarang = Kelas::where(['id' => $kelas])->first('nama_kelas')->nama_kelas;
        $kelas = Kelas::get(['id', 'nama_kelas']);
        // dd($alpa);
        return view('guest.index', compact(['sakit', 'terlambat', 'izin', 'alpa', 'kelas', 'kelassekarang']));
    }
}
