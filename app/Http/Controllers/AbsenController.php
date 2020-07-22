<?php

namespace App\Http\Controllers;

use App\Absenmapel;
use App\Kelas;
use App\Mapel;
use App\Siswa;
use Illuminate\Http\Request;

class AbsenController extends Controller
{

    public function index()
    {
        $mapel = Mapel::get(['id', 'nama_mapel']);

        return view('absen.index', compact('mapel'));
    }

    public function showKelas()
    {
        $kelas = Kelas::get(['id', 'nama_kelas']);

        return view('absen.kelas', compact('kelas'));
    }

    public function showTgl()
    {
        return vieW('absen.showtgl');
    }

    public function showAbsen(Request $request)
    {
        $siswa = Siswa::with('absenmapel')->where('kelas', $request->kelas)->get(['id', 'nis_lokal', 'nama_siswa']);
        $mapel = $request->mapel;
        $kelas = $request->kelas;
        $jenisabsen = $request->jenisabsen;

        return view('absen.absensekarang', ['siswa' => $siswa, 'mapel' => $mapel, 'jenisabsen' => $jenisabsen, 'kelas' => $kelas]);
    }

    public function showAbsenBulan(Request $request)
    {
        $siswa = Siswa::with('absenmapel')->where('kelas', $request->kelas)->get(['id', 'nis_lokal', 'nama_siswa']);
        $namamapel = Mapel::where('id', $request->mapel)->first();
        $mapel = $request->mapel;
        $kelas = $request->kelas;
        $jenisabsen = $request->jenisabsen;
        $bulan = $request->bulanabsen;
        $tahun = $request->tahunabsen;

        return view('absen.absenbulan', ['bulan' => $bulan, 'tahun' => $tahun, 'siswa' => $siswa, 'mapel' => $mapel, 'jenisabsen' => $jenisabsen, 'kelas' => $kelas, 'namamapel' => $namamapel->nama_mapel]);
    }
    public function rekapAbsen(Request $request)
    {
        $siswa = Siswa::where('kelas', $request->kelas)->get();
        $namamapel = Mapel::where('id', $request->mapel)->first('nama_mapel');
        $mapel = $request->mapel;
        $kelas = $request->kelas;
        $jenisabsen = $request->jenisabsen;
        $bulan = $request->bulanabsen;
        $tahun = $request->tahunabsen;

        return view('absen.rekap', ['bulan' => $bulan, 'tahun' => $tahun, 'siswa' => $siswa, 'mapel' => $mapel, 'jenisabsen' => $jenisabsen, 'kelas' => $kelas, 'namamapel' => $namamapel->nama_mapel]);
    }

    public function saveAbsen(Request $request)
    {
        $data = [
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'mapel' => $request->mapel,
            'tgl' => $request->tgl,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nama' => $request->nama,
            'kehadiran' => $request->kehadiran,
        ];
        Absenmapel::create([
            'nis' => $request->nis,
            'mapel' => $request->mapel,
            'kelas' => $request->kelas,
            'kehadiran' => $request->kehadiran,
            'tgl' => $request->tgl,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);
        return vieW('absen.button', compact('data'));
    }

    public function editAbsen(Request $request)
    {
        $data = [
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'mapel' => $request->mapel,
            'tgl' => $request->tgl,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nama' => $request->nama,
            'kehadiran' => $request->kehadiran,
        ];
        if ($request->kehadiran == 'Kosongkan') {
            Absenmapel::where([
                'nis' => $request->nis,
                'mapel' => $request->mapel,
                'kelas' => $request->kelas,
                'tgl' => $request->tgl,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
            ])->delete();
        } else {
            Absenmapel::where([
                'nis' => $request->nis,
                'mapel' => $request->mapel,
                'kelas' => $request->kelas,
                'tgl' => $request->tgl,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
            ])->update(['kehadiran' => $request->kehadiran]);
        }
        return vieW('absen.button', compact('data'));
    }
}
