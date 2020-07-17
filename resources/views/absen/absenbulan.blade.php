@extends('main')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/datatables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $namamapel . ' - ' . $bulan . '/' . $tahun}} </h4>
            <hr>

            <table id="absen" class="display">
                <thead>
                    <tr>
                        <th style="width: 40px">( No )</th>
                        <th style="width: 80px">Nama</th>
                        @php
                            $date = new DateTime('first Sunday '.$tahun.'-'.$bulan);
                            while ($date->format('m') == $bulan) {
                                $minggu[] = $date->format('j');
                                $date->modify('next Sunday');
                            }
                        @endphp
                        @for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun); $i++)
                            @if (in_array($i, $minggu))
                                <th style="width: 50px">Minggu</th>
                            @else
                                <th style="width: 50px">{{$i}}</th>
                            @endif
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $key => $s)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $s->nama_siswa }}</td>
                            @for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun); $i++)
                                <td >
                                    <div id="{{'showTd'. $i . $s->nis_lokal}}" class="btn-group">
                                        @php
                                            $kehadiran = get_absen($s->nis_lokal, $mapel , $i, $bulan, $tahun);
                                        @endphp
                                        @if (in_array($i, $minggu))
                                            <div class=""></div>
                                            @else
                                                @if ($kehadiran)
                                                @if ($kehadiran->kehadiran == 1)

                                                    <button data-toggle="modal" data-jenis="edit" data-target="#absenday{{$i . $s->nis_lokal}}" class="btn btn-sm btn-modal btn-success" style="width: 35px">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                @elseif($kehadiran->kehadiran == 2)

                                                    <button data-toggle="modal" data-jenis="edit" data-target="#absenday{{$i . $s->nis_lokal}}" class="btn btn-sm btn-modal btn-warning" style="width: 35px">
                                                        <i class="fas fa-clock"></i>
                                                    </button>

                                                @elseif($kehadiran->kehadiran == 3)

                                                    <button data-toggle="modal" data-jenis="edit" data-target="#absenday{{$i . $s->nis_lokal}}" class="btn btn-sm btn-modal btn-info" style="width: 35px">
                                                        <i class="fas fa-plus-square"></i>
                                                    </button>

                                                @elseif($kehadiran->kehadiran == 4)
                                                    <button data-toggle="modal" data-jenis="edit" data-target="#absenday{{$i . $s->nis_lokal}}" class="btn btn-sm btn-modal btn-primary" style="width: 35px">
                                                        <i class="fas fa-envelope"></i>
                                                    </button>

                                                @elseif($kehadiran->kehadiran == 5)

                                                    <button data-toggle="modal" data-jenis="edit" data-target="#absenday{{$i . $s->nis_lokal}}" class="btn btn-sm btn-modal btn-danger" style="width: 35px">
                                                        <i class="fas fa-close"></i>
                                                    </button>
                                                    @else

                                                        <button data-toggle="modal" data-target="#absenday{{$i . $s->nis_lokal}}" class="btn btn-sm btn-modal btn-secondary" style="width: 35px">
                                                            ...
                                                        </button>
                                                @endif
                                            @else

                                                <button data-toggle="modal" data-target="#absenday{{$i . $s->nis_lokal}}" class="btn btn-sm btn-modal btn-secondary" style="width: 35px">
                                                    ...
                                                </button>

                                            @endif
                                        @endif
                                    </div>
                                    <div id="absenday{{$i . $s->nis_lokal}}" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true" style="margin-top: 20vh">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                            <div class="modal-header justify-content-between">
                                                    <div class="col-sm-10 col-md-10">
                                                        <h4 class="modal-title" id="myModalLabel2">Tentukan Absen</h4>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">
                                                        <button type="button" data-modals="{{$i . $s->nis_lokal}}" class="close"><span>×</span></button>
                                                    </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <p>Tgl : {{$i}}</p>
                                                    <p>Nama : {{$s->nama_siswa}}</p>
                                                    <button class="btnAbsen btn btn-success" data-nis="{{$s->nis_lokal}}" data-mapel="{{$mapel}}" data-tgl="{{ $i }}" data-kelas="{{$kelas}}" data-bulan="{{$bulan}}" data-tahun="{{$tahun}}" data-jenis="{{$jenisabsen}}" data-modals="{{$i . $s->nis_lokal}}" data-nama="{{$s->nama_siswa}}" data-original-title="1" style="width: 45px;"><i class="fas fa-check"></i></button>
                                                    <button class="btnAbsen btn btn-warning" data-nis="{{$s->nis_lokal}}" data-mapel="{{$mapel}}" data-tgl="{{ $i }}" data-kelas="{{$kelas}}" data-bulan="{{$bulan}}" data-tahun="{{$tahun}}" data-jenis="{{$jenisabsen}}" data-modals="{{$i . $s->nis_lokal}}" data-nama="{{$s->nama_siswa}}" data-original-title="2" style="width: 45px;"><i class="fas fa-clock"></i></button>
                                                    <button class="btnAbsen btn btn-info" data-nis="{{$s->nis_lokal}}" data-mapel="{{$mapel}}" data-tgl="{{ $i }}" data-kelas="{{$kelas}}" data-bulan="{{$bulan}}" data-tahun="{{$tahun}}" data-jenis="{{$jenisabsen}}" data-modals="{{$i . $s->nis_lokal}}" data-nama="{{$s->nama_siswa}}" data-original-title="3" style="width: 45px;"><i class="fas fa-plus-square"></i></button>
                                                    <button class="btnAbsen btn btn-primary" data-nis="{{$s->nis_lokal}}" data-mapel="{{$mapel}}" data-tgl="{{ $i }}" data-kelas="{{$kelas}}" data-bulan="{{$bulan}}" data-tahun="{{$tahun}}" data-jenis="{{$jenisabsen}}" data-modals="{{$i . $s->nis_lokal}}" data-nama="{{$s->nama_siswa}}" data-original-title="4" style="width: 45px;"><i class="fas fa-envelope"></i></button>
                                                    <button class="btnAbsen btn btn-danger" data-nis="{{$s->nis_lokal}}" data-mapel="{{$mapel}}" data-tgl="{{ $i }}" data-kelas="{{$kelas}}" data-bulan="{{$bulan}}" data-tahun="{{$tahun}}" data-jenis="{{$jenisabsen}}" data-modals="{{$i . $s->nis_lokal}}" data-nama="{{$s->nama_siswa}}" data-original-title="5" style="width: 45px;"><i class="fas fa-close"></i></button>
                                                    <button class="btnAbsen btn btn-default mt-1" data-nis="{{$s->nis_lokal}}" data-mapel="{{$mapel}}" data-tgl="{{ $i }}" data-kelas="{{$kelas}}" data-bulan="{{$bulan}}" data-tahun="{{$tahun}}" data-jenis="{{$jenisabsen}}" data-modals="{{$i . $s->nis_lokal}}" data-nama="{{$s->nama_siswa}}" data-original-title="Kosongkan" style="width: 240px">....</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('js')
<script type="text/javascript" src="{{asset('dist/js/datatables.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#absen').DataTable({
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: true,
            ordering: false
        })

        $('.close').on('click', function(){
            let modals = $(this).data('modals')
            $('#absenday'+modals).modal('hide')
        })

        $('.btnAbsen[data-original-title="Kosongkan"]').on('click', function(){
            let modals = $(this).data('modals')
            $('#absenday'+modals).modal('hide')
        })

        $('.btnAbsen').on('click', function(){
            let nis = $(this).data('nis')
            let mapel = $(this).data('mapel')
            let tgl = $(this).data('tgl')
            let kelas = $(this).data('kelas')
            let bulan = $(this).data('bulan')
            let tahun = $(this).data('tahun')
            let jenis = $(this).data('jenis')
            let modals = $(this).data('modals')
            let nama = $(this).data('nama')
            let kehadiran = $(this).data('original-title')
            let token = "{{ csrf_token() }}"
            if($('button[data-target="#absenday'+tgl+nis+'"]').data('jenis') == 'edit'){
                $.ajax({
                    url: '/absen/editabsen',
                    type: 'POST',
                    data: {
                        _token: token,
                        nama: nama,
                        nis: nis,
                        kelas: kelas,
                        mapel: mapel,
                        tgl: tgl,
                        bulan: bulan,
                        tahun: tahun,
                        jenis: jenis,
                        kehadiran: kehadiran
                        },
                    success: function(data){
                        $('#absenday'+modals).modal('hide')
                        $('#showTd'+tgl+nis).html(data)
                    }
                })
            }else{
                $.ajax({
                    url: '/absen/saveabsen',
                    type: 'POST',
                    data: {
                        _token: token,
                        nama: nama,
                        nis: nis,
                        kelas: kelas,
                        mapel: mapel,
                        tgl: tgl,
                        bulan: bulan,
                        tahun: tahun,
                        jenis: jenis,
                        kehadiran: kehadiran
                        },
                    success: function(data){
                        $('#absenday'+modals).modal('hide')
                        $('#showTd'+tgl+nis).html(data)
                    }
                })
            }
        })
    });

</script>
@endsection
