<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Kelas;
use App\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all()->count();
        $guru = Guru::all()->count();
        $kelas = Kelas::all()->count();
        return view('dashboard.index', ['siswa' => $siswa, 'guru' => $guru, 'kelas' => $kelas]);
    }
}
