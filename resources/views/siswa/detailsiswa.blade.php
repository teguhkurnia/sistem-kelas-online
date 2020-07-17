@extends('main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Detail : {{$siswa->nis_lokal . ' - ' . $siswa->nama_siswa . ' - ' . $siswa->kelas}}</h3>
                    <hr>

                    <div class="col col-md-6 col-sm-6 float-left">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>NIS</th>
                                    <td>:</td>
                                    <td>{{ $siswa->nis_lokal }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Lenkap</th>
                                    <td>:</td>
                                    <td>{{ $siswa->nama_siswa }}</td>
                                </tr>
                                <tr>
                                    <th>Foto</th>
                                    <td>:</td>
                                    <td><img src="{{ asset("assets/images/siswa/$siswa->foto") }}" alt="Foto Siswa" style="margin: 0;width: 150px; height: 170px"></td>
                                </tr>
                                <tr>
                                    <th>NISN</th>
                                    <td>:</td>
                                    <td>{{ $siswa->nisn }}</td>
                                </tr>
                                <tr>
                                    <th>No Induk</th>
                                    <td>:</td>
                                    <td>{{ $siswa->no_induk }}</td>
                                </tr>
                                <tr>
                                    <th>Status Siswa</th>
                                    <td>:</td>
                                    <td>{{ $siswa->status_siswa }}</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>:</td>
                                    <td>{{ $siswa->kelas }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamiin <br>Agama</th>
                                    <td>:</td>
                                    <td>{{ $siswa->jk }} <br> {{ $siswa->agama }}</td>
                                </tr>
                                <tr>
                                    <th>TTL</th>
                                    <td>:</td>
                                    <td>{{ ucfirst($siswa->tempat_lahir) . ', ' . date("d F Y", strtotime($siswa->tgl_lahir))}}</td>
                                </tr>
                                <tr>
                                    <th>Jarak Rumah Ke Sekolah</th>
                                    <td>:</td>
                                    <td>{{ $siswa->jarak_rumahsekolah }} KM</td>
                                </tr>
                                <tr>
                                    <th>Cita-Cita <br>Hobi</th>
                                    <td>:</td>
                                    <td>{{ $siswa->cita_cita .',' }} <br>{{ $siswa->hobi }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah Saudara</th>
                                    <td>:</td>
                                    <td>{{ $siswa->jumlah_saudara }} Bersaudara</td>
                                </tr>
                            </tbody>
                        </table>

                        <h4 class="text-center">Sekolah Asal</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nama Sekolah</th>
                                    <td>:</td>
                                    <td>{{ $sekolahasal ? $sekolahasal->sekolah_asal : '-'}}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Sekolah</th>
                                    <td>:</td>
                                    <td>{{ $sekolahasal ? $sekolahasal->jenis_sekolahasal : '-'}}</td>
                                </tr>
                                <tr>
                                    <th>Status Sekolah</th>
                                    <td>:</td>
                                    <td>{{ $sekolahasal ? $sekolahasal->status_sekolahasal : '-'}}</td>
                                </tr>
                                <tr>
                                    <th>Kabupaten Sekolah</th>
                                    <td>:</td>
                                    <td>{{ $sekolahasal ? $sekolahasal->kabupaten_sekolahasal : '-'}}</td>
                                </tr>
                                <tr>
                                    <th>No Ujian Sebelumnya</th>
                                    <td>:</td>
                                    <td>{{ $sekolahasal ? $sekolahasal->no_ujiansebelumnya : '-'}}</td>
                                </tr>
                                <tr>
                                    <th>NPSN Sebelumnya</th>
                                    <td>:</td>
                                    <td>{{ $sekolahasal ? $sekolahasal->npsn_sekolahasal : '-'}}</td>
                                </tr>
                                <tr>
                                    <th>Blanko SKHUN</th>
                                    <td>:</td>
                                    <td>{{ $sekolahasal ? $sekolahasal->blanko_skhunasal : '-'}}</td>
                                </tr>
                                <tr>
                                    <th>No Ijazah</th>
                                    <td>:</td>
                                    <td>{{ $sekolahasal ? $sekolahasal->no_ijazahasal : '-'}}</td>
                                </tr>
                                <tr>
                                    <th>Nilai UN</th>
                                    <td>:</td>
                                    <td>{{ $sekolahasal ? $sekolahasal->nilai_un : '-'}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Kelulusan</th>
                                    <td>:</td>
                                    <td>{{ $sekolahasal ? $sekolahasal->tgl_kelulusan : '-'}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <h5 class="text-center">Orang Tua / Wali</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Almat Orang Tua</th>
                                    <td>:</td>
                                    <td>
                                        {{ $alamatortu[0] }}
                                        <br>
                                        @if ($alamatortu[7] !== '-')
                                            @foreach ($alamatortu[7] as $ao)
                                                {{$ao . ' - '}}
                                            @endforeach
                                        @endif
                                        {{$alamatortu[2] . ', ' . $alamatortu[3] . ', ' . $alamatortu[4]}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Telp Ortu / Wali</th>
                                    <td>:</td>
                                    <td>{{ $siswa->phone_ortuwali }}</td>
                                </tr>
                                <tr>
                                    <th>Kode POS</th>
                                    <td>:</td>
                                    <td>{{ $alamatortu[5] }}</td>
                                </tr>
                                <tr>
                                    <th>No KK</th>
                                    <td>:</td>
                                    <td>{{ $alamatortu[6] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col col-md-6 col-sm-6 float-left">
                        <h5 class="text-center">Ayah</h5>
                        <table class="table">
                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td>{{ $siswa->ayah ? $siswa->ayah->nik_ayah : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $siswa->ayah ? $siswa->ayah->nama_ayah : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td>:</td>
                                <td>{{ $siswa->ayah ? $siswa->ayah->pendidikan_ayah : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>:</td>
                                <td>{{ $siswa->ayah ? $siswa->ayah->pekerjaan_ayah : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Penghasilan</th>
                                <td>:</td>
                                <td>Rp. {{ $siswa->ayah ? $siswa->ayah->penghasilan_ayah : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>:</td>
                                <td>
                                    @if (!empty($siswa->ayah->tgllahir_ayah))
                                        {{date("d F Y", strtotime($siswa->ayah->tgllahir_ayah))}}
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <h5 class="text-center">Ibu</h5>
                        <table class="table">
                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td>{{ $siswa->ibu ? $siswa->ibu->nik_ibu : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $siswa->ibu ? $siswa->ibu->nama_ibu : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td>:</td>
                                <td>{{ $siswa->ibu ? $siswa->ibu->pendidikan_ibu : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>:</td>
                                <td>{{ $siswa->ibu ? $siswa->ibu->pekerjaan_ibu : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Penghasilan</th>
                                <td>:</td>
                                <td>Rp. {{ $siswa->ibu ? $siswa->ibu->penghasilan_ibu : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>:</td>
                                <td>
                                    @if (!empty($siswa->ibu->tgllahir_ibu))
                                        {{date("d F Y", strtotime($siswa->tgllahir_ibu))}}
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <h5 class="text-center">Wali</h5>
                        <table class="table">
                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td>{{ $siswa->wali ? $siswa->wali->nik_wali : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $siswa->wali ? $siswa->wali->nama_wali : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td>:</td>
                                <td>{{ $siswa->wali ? $siswa->wali->pendidikan_wali : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>:</td>
                                <td>{{ $siswa->wali ? $siswa->wali->pekerjaan_wali : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Penghasilan</th>
                                <td>:</td>
                                <td>Rp. {{ $siswa->wali ? $siswa->wali->penghasilan_wali : '-'}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>:</td>
                                <td>
                                    @if (!empty($siswa->wali->tgllahir_wali))
                                        {{date("d F Y", strtotime($siswa->wali->tgllahir_wali))}}
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <h5 class="text-center">Lain - Lain</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>No KKS / KPS</th>
                                    <td>:</td>
                                    <td>{{ $siswa->no_kks }}</td>
                                </tr>
                                <tr>
                                    <th>No KPH</th>
                                    <td>:</td>
                                    <td>{{ $siswa->no_kph }}</td>
                                </tr>
                                <tr>
                                    <th>No KIP</th>
                                    <td>:</td>
                                    <td>{{ $siswa->no_kip }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" style="color: rgba(0,0,0,.4)">Program Indonesia Pintar</th>
                                </tr>
                                <tr>
                                    <th>Status Penerima</th>
                                    <td>:</td>
                                    <td>{{ $siswa->pid_status_penerima }}</td>
                                </tr>
                                <tr>
                                    <th>Periode Penerima</th>
                                    <td>:</td>
                                    <td>{{ $siswa->pid_periode }}</td>
                                </tr>
                                <tr>
                                    <th>Alasan Menerima</th>
                                    <td>:</td>
                                    <td>{{ $siswa->pid_alasan_menerima }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" style="color: rgba(0,0,0,.4)">Prestasi tertinggi yang pernah diraih</th>
                                </tr>
                                <tr>
                                    <th>Bidang Prestasi</th>
                                    <td>:</td>
                                    <td>{{ $siswa->bidang_prestasi}}</td>
                                </tr>
                                <tr>
                                    <th>Peringkat Prestasi</th>
                                    <td>:</td>
                                    <td>{{ $siswa->peringkat_prestasi }}</td>
                                </tr>
                                <tr>
                                    <th>Tingkat Prestasi</th>
                                    <td>:</td>
                                    <td>{{ $siswa->tingkat_prestasi }}</td>
                                </tr>
                                <tr>
                                    <th>Tahun Prestasi</th>
                                    <td>:</td>
                                    <td>{{ $siswa->tahun_prestasi }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" style="color: rgba(0,0,0,.4)">Beasiswa</th>
                                </tr>
                                <tr>
                                    <th>Status Beasiswa</th>
                                    <td>:</td>
                                    <td>{{ $siswa->status_beasiswa}}</td>
                                </tr>
                                <tr>
                                    <th>Sumber Beasiswa</th>
                                    <td>:</td>
                                    <td>{{ $siswa->sumber_beasiswa}}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Beasiswa</th>
                                    <td>:</td>
                                    <td>{{ $siswa->jenis_beasiswa}}</td>
                                </tr>
                                <tr>
                                    <th>Jangka Waktu Beasiswa</th>
                                    <td>:</td>
                                    <td>{{ $siswa->jangka_waktu_beasiswa}}</td>
                                </tr>
                                <tr>
                                    <th>Besar Beasiswa</th>
                                    <td>:</td>
                                    <td>Rp .{{ $siswa->besar_uang_beasiswa}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
