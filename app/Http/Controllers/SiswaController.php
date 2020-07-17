<?php

namespace App\Http\Controllers;

use App\Ayah;
use App\Desa;
use App\Exports\SiswaExport;
use App\Http\Requests\SiswaRequest;
use App\Http\Requests\AyahRequest;
use App\Ibu;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelas;
use App\Provinsi;
use App\Sekolahasal;
use App\Siswa;
use App\Wali;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $siswa = Siswa::orderBy('id', 'asc')->paginate(5);
        return view('siswa.index', ['siswa' => $siswa]);
    }

    public function ubahFoto($nis)
    {
        $siswa = Siswa::where('nis_lokal', $nis)->firstOrFail();
        return view('siswa.datasiswa_ubahfoto', ['siswa' => $siswa]);
    }

    public function upFoto(Request $request)
    {
        $request->validate([
            'file' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->file->isValid()) {
            $full_name = $request->nis_lokal . time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->storeAs('siswa', $full_name, 'images');
            $q = Siswa::where('nis_lokal', $request->nis_lokal)->update(['foto' => $full_name]);
            return back()->with('success', 'Foto Berhasil Dirubah');
        } else {
            return back()->with('error', 'Foto Gagal Dirubah');
        }
    }

    public function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $paginate = $request->get('paginate');
            $query = $request->get('query');
            $query = str_replace(' ', '#', $query);
            $siswa = Siswa::orderBy($sort_by, $sort_type)
                ->where('id', 'like', '%' . $query . '%')
                ->orWhere('nis_lokal', 'like', '%' . $query . '%')
                ->orWhere('nama_siswa', 'like', '%' . $query . '%')
                ->paginate($paginate);
            return view('siswa.datasiswa_data', compact('siswa'))->render();
        }
    }

    public function form_tambah()
    {
        $kelas = Kelas::all();
        $provinsi = Provinsi::oldest('nama')->get();
        $siswa = new Siswa();
        $alamatortu = [];
        return view('siswa.tambahsiswa.tambahsiswa', ['kelas' => $kelas, 'provinsi' => $provinsi, 'siswa' => $siswa, 'alamatortu' => $alamatortu]);
    }

    public function form_edit($nis)
    {
        $kelas = Kelas::all();
        $provinsi = Provinsi::all();
        $siswa = Siswa::where('nis_lokal', $nis)->firstOrFail();
        if ($siswa->ayah) {
            $alamatortu = $siswa->ayah;
        } elseif ($siswa->ibu) {
            $alamatortu = $siswa->ibu;
        } elseif ($siswa->wali) {
            $alamatortu = $siswa->wali;
        } else {
            $alamatortu = [];
        }
        return view('siswa.tambahsiswa.editsiswa', ['kelas' => $kelas, 'provinsi' => $provinsi, 'siswa' => $siswa, 'alamatortu' => $alamatortu]);
    }

    public function edit_siswa(SiswaRequest $siswaRequest)
    {
        $siswa = Siswa::where('nis_lokal', $siswaRequest->nis_lokal)->first();
        $siswa->update($siswaRequest->validated());
        if ($siswaRequest->nik_ayah) {
            $ayah = Ayah::where('nik', $siswaRequest->nik_ayah)->first();
            ($ayah->count() > 0) ? $ayah->update($this->dataAyah($siswaRequest)) : Ayah::create($this->dataAyah($siswaRequest));
        }
        if ($siswaRequest->nik_ibu) {
            $ibu = Ibu::where('nik', $siswaRequest->nik_ibu)->first();
            ($ibu->count() > 0) ? $ibu->update($this->dataIbu($siswaRequest)) : Ibu::create($this->dataIbu($siswaRequest));
        }
        if ($siswaRequest->nik_wali) {
            $wali = Wali::where('nik', $siswaRequest->nik_wali)->first();
            ($wali->count() > 0) ? $wali->update($this->dataWali($siswaRequest)) : Wali::create($this->dataWali($siswaRequest));
        }

        return Sekolahasal::where('nis_siswa', $siswaRequest->nis_lokal)->update($this->dataSekolahasal($siswaRequest)) ? back()->with('success', 'Data Berhasil Dirubah') : back()->with('error', 'Data Gagal Dirubah');
    }

    public function fetch_wilayah(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $nama_wilayah = $request->get('wilayah');
            if ($nama_wilayah == 'kabupaten') {
                $kab = Kabupaten::where('provinsi_id', $id)->oldest('nama')->get();
            } elseif ($nama_wilayah == 'kecamatan') {
                $kab = Kecamatan::where('kabupaten_id', $id)->oldest('nama')->get();
            } elseif ($nama_wilayah == 'desa') {
                $kab = Desa::where('kecamatan_id', $id)->oldest('nama')->get();
            }
            echo "<option>-- Pilih $nama_wilayah --</option>";
            foreach ($kab as $k) {
                if ($nama_wilayah == 'kabupaten') {
                    if ($k->id == $request->get('skab')) {
                        echo "<option value='$k->id' data-id='$k->id' selected>$k->nama</option>";
                    } else {
                        echo "<option value='$k->id' data-id='$k->id'>$k->nama</option>";
                    }
                }

                if ($nama_wilayah == 'kecamatan') {
                    if ($k->id == $request->get('skec')) {
                        echo "<option value='$k->id' data-id='$k->id' selected>$k->nama</option>";
                    } else {
                        echo "<option value='$k->id' data-id='$k->id'>$k->nama</option>";
                    }
                }

                if ($nama_wilayah == 'desa') {
                    if ($k->id == $request->get('sdes')) {
                        echo "<option value='$k->id' data-id='$k->id' selected>$k->nama</option>";
                    } else {
                        echo "<option value='$k->id' data-id='$k->id'>$k->nama</option>";
                    }
                }
            };
        } else {
            return 'rerro';
        }
    }

    public function tambah(SiswaRequest $request)
    {
        $siswa = $request->validated();
        $siswa['created_at'] = now();
        $siswa['updated_at'] = now();
        // Sekolahasal::create($this->dataSekolahasal($request));

        if ($siswa['nik_ayah']) {
            Ayah::create($this->dataAyah($request));
        }
        if ($siswa['nik_ibu']) {
            Ibu::create($this->dataAyah($request));
        }
        if ($siswa['nik_wali']) {
            Wali::create($this->dataWali($request));
        }

        return Siswa::insert($siswa) ? back()->with('success', 'Data Berhasil Disimpan') : back()->with('error', 'Data Gagal Disimpan');
    }

    public function detailSiswa($nis)
    {
        $siswa = Siswa::where('nis_lokal', $nis)->first();
        $sekolahasal = $siswa->sekolahasal;

        if ($siswa->ayah) {
            $alamatortu = [$siswa->ayah->alamat_ayah, $siswa->ayah->provinsi_ayah, $siswa->ayah->kabupaten_ayah, $siswa->ayah->kecamatan_ayah, $siswa->ayah->desa_ayah, $siswa->ayah->kodepos_ayah, $siswa->ayah->nokk_ayah];
        } elseif ($siswa->ibu) {
            $alamatortu = [$siswa->ibu->alamat_ibu, $siswa->ibu->provinsi_ibu, $siswa->ibu->kabupaten_ibu, $siswa->ibu->kecamatan_ibu, $siswa->ibu->desa_ibu, $siswa->ibu->kodepos_ibu, $siswa->ibu->nokk_ibu];
        } elseif ($siswa->wali) {
            $alamatortu = [$siswa->wali->alamat_wali, $siswa->wali->provinsi_wali, $siswa->wali->kabupaten_wali, $siswa->wali->kecamatan_wali, $siswa->wali->desa_wali, $siswa->wali->kodepos_wali, $siswa->wali->nokk_wali];
        } else {
            $alamatortu = ['-', '-', '-', '-', '-', '-', '-', '-'];
        }
        if ($alamatortu[1] !== '-') {
            $prov_ortu = Provinsi::where('id', $alamatortu[1])->pluck('nama');
            if ($prov_ortu) {
                array_push($alamatortu, $prov_ortu);
            }
        }
        return view('siswa.detailsiswa', ['siswa' => $siswa, 'alamatortu' => $alamatortu, 'sekolahasal' => $sekolahasal]);
    }

    public function dataAyah($request)
    {
        return [
            'nik' => $request->nik_ayah,
            'nokk' => $request->nokk,
            'kodepos' => $request->kodepos,
            'nama' => $request->nama_ayah,
            'tgllahir' => $request->tgl_ayah,
            'pendidikan' => $request->pendidikan_ayah,
            'pekerjaan' => $request->pekerjaan_ayah,
            'penghasilan' => $request->penghasilan_ayah,
            'alamat' => $request->alamat_ayah,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
        ];
    }

    public function dataIbu($request)
    {
        return [
            'nik' => $request->nik_ibu,
            'nokk' => $request->nokk,
            'kodepos' => $request->kodepos,
            'nama' => $request->nama_ibu,
            'tgllahir' => $request->tgl_ibu,
            'pendidikan' => $request->pendidikan_ibu,
            'pekerjaan' => $request->pekerjaan_ibu,
            'penghasilan' => $request->penghasilan_ibu,
            'alamat' => $request->alamat_ibu,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
        ];
    }

    public function dataWali($request)
    {
        return [
            'nik' => $request->nik_wali,
            'nokk' => $request->nokk,
            'kodepos' => $request->kodepos,
            'nama' => $request->nama_wali,
            'tgllahir' => $request->tgl_wali,
            'pendidikan' => $request->pendidikan_wali,
            'pekerjaan' => $request->pekerjaan_wali,
            'penghasilan' => $request->penghasilan_wali,
            'alamat' => $request->alamat_wali,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
        ];
    }

    public function dataSekolahasal($request)
    {
        return [
            'nis_siswa' => $request->nis_lokal,
            'nisn' => $request->nisn,
            'sekolah_asal' => $request->sekolah_asal,
            'jenis_sekolahasal' => $request->jenis_sekolahasal,
            'status_sekolahasal' => $request->status_sekolahasal,
            'kabupaten_sekolahasal' => $request->kabupaten_sekolahasal,
            'no_ujiansebelumnya' => $request->no_ujiansebelumnya,
            'npsn_sekolahasal' => $request->npsn_sekolahasal,
            'blanko_skhunasal' => $request->blanko_skhunasal,
            'no_ijazahasal' => $request->no_ijazahasal,
            'nilai_un' => $request->nilai_un,
            'tgl_kelulusan' => $request->tgl_kelulusan,
        ];
    }

    public function delete($nis)
    {
        if (Siswa::where('nis_lokal', $nis)->delete()) {
            return redirect()->back()->with('success', 'Hapus Data Sukses');
        } else {
            return redirect()->back()->with('error', 'Hapus Data Gagal');
        }
    }
    public function export()
    {
        return Excel::download(new SiswaExport, 'users.xlsx');
    }

    public function exportFromNis($nis)
    {
        return Excel::download(new SiswaExport($nis), 'users.xlsx');
    }
}
