<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nis_lokal' => 'nullable',
            'nisn' => 'nullable',
            'no_induk' => 'nullable',
            'nama_siswa' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tgl_lahir' => 'nullable',
            'kelas' => 'nullable',
            'jk' => 'nullable',
            'agama' => 'nullable',
            'alamat' => 'nullable',
            'phone_ortuwali' => 'nullable',
            'jarak_rumahsekolah' => 'nullable',
            'kendaraan' => 'nullable',
            'status_siswa' => 'nullable',
            'hobi' => 'nullable',
            'foto' => 'nullable',
            'cita_cita' => 'nullable',
            'jumlah_saudara' => 'nullable',
            'nik_ayah' => 'nullable',
            'nik_ibu' => 'nullable',
            'nik_wali' => 'nullable',
            'no_kks' => 'nullable',
            'no_kph' => 'nullable',
            'no_kip' => 'nullable',
            'pid_status_penerima' => 'nullable',
            'pid_alasan_menerima' => 'nullable',
            'pid_periode' => 'nullable',
            'bidang_prestasi' => 'nullable',
            'tingkat_prestasi' => 'nullable',
            'tahun_prestasi' => 'nullable',
            'status_beasiswa' => 'nullable',
            'sumber_beasiswa' => 'nullable',
            'jenis_beasiswa' => 'nullable',
            'jangka_waktu_beasiswa' => 'nullable',
            'besar_uang_beasiswa' => 'nullable',
            'peringkat_prestasi' => 'nullable',
        ];
    }
}
