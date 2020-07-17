<?php

namespace App\Http\Controllers;

use App\Kas;
use Illuminate\Http\Request;

class ApiKasController extends Controller
{
    public $kas;

    public function __construct()
    {
        $this->kas = new Kas;
    }


    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kelas, $bulan, $tahun)
    {
        return $this->kas->getKasPerBulan($kelas, $bulan, $tahun);
    }

    public function showKasTahunan($kelas, $tahun)
    {
        return $this->kas->getKasTahunan($kelas, $tahun);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
