<?php

namespace App\Http\Controllers;

use App\Kas;
use App\Kelas;
use App\Siswa;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kas.index', ['kelas' => $kelas]);
    }

    public function showkas(Request $request)
    {
        $kelas = $request->kelas;
        $tahun = $request->tahun;
        $siswa = Siswa::where('kelas', $kelas)->get();
        return view('kas.showkas', ['siswa' => $siswa, 'tahun' => $tahun, 'kelas' => $kelas]);
    }

    public function submitkas(Request $request)
    {
        Kas::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'minggu' => $request->minggu,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);

        return "<button  data-jenis='hapus' data-nis='$request->nis' data-minggu='$request->minggu' data-kelas='$request->kelas' data-nama='$request->nama' data-bulan='$request->bulan' data-tahun='$request->tahun' class='btn btn-kas btn-sm btn-modal btn-secondary' style='width: 35px'>
                <i class='fas fa-check'></i>
            </button>";
    }

    public function hapuskas(Request $request)
    {
        Kas::where(['nama' => $request->nama, 'minggu' => $request->minggu, 'bulan' => $request->bulan, 'tahun' => $request->tahun])->delete();
        return "<button  data-jenis='add' data-nis='$request->nis' data-minggu='$request->minggu' data-kelas='$request->kelas' data-nama='$request->nama' data-bulan='$request->bulan' data-tahun='$request->tahun' class='btn btn-kas btn-sm btn-modal btn-secondary' style='width: 35px'>
                    ...
                </button>";
    }
}
