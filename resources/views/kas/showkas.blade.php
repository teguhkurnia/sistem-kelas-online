@extends('main')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/datatables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/jquery.dataTables.min.css') }}"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Title</h5>

            <table id="kas" class="display">
                <thead>
                    <tr>
                        <th rowspan="2">(NO)</th>
                        <th rowspan="2">Nama</th>
                        @for ($i = 1; $i <= 12; $i++)
                            <th colspan="4">{{ date('F', strtotime("$i/12/10")) }}</th>
                        @endfor
                    </tr>
                    <tr>
                        @for ($i = 1; $i <= 12; $i++)
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $key => $s)
                        <tr>
                            <td>{{$key + 1 }}</td>
                            <td>{{$s->nama_siswa}}</td>
                            @for ($i = 1; $i <= 12; $i++)
                                <td>
                                    <div id="{{ 1 . $kelas . $i . $s->nis_lokal }}" class="klik">
                                        @if (checkKas($s->nama_siswa, 1, $i, $tahun))
                                            <button  data-jenis='hapus' data-nis="{{ $s->nis_lokal }}" data-minggu='1' data-kelas="{{ $kelas }}" data-nama="{{ $s->nama_siswa }}" data-bulan="{{ $i }}" data-tahun="{{ $tahun }}" class="btn btn-kas btn-sm btn-modal btn-secondary" style="width: 35px">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        @else
                                            <button data-jenis="add" data-nis="{{ $s->nis_lokal }}" data-minggu='1' data-kelas="{{ $kelas }}" data-nama="{{ $s->nama_siswa }}" data-bulan="{{ $i }}" data-tahun="{{ $tahun }}" class="btn btn-kas btn-sm btn-modal btn-secondary" style="width: 35px">
                                                ...
                                            </button>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div id="{{ 2 . $kelas . $i . $s->nis_lokal }}" class="klik">
                                        @if (checkKas($s->nama_siswa, 2, $i, $tahun))
                                            <button  data-jenis='hapus' data-nis="{{ $s->nis_lokal }}" data-minggu='2' data-kelas="{{ $kelas }}" data-nama="{{ $s->nama_siswa }}" data-bulan="{{ $i }}" data-tahun="{{ $tahun }}" class="btn btn-kas btn-sm btn-modal btn-secondary" style="width: 35px">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        @else
                                            <button data-jenis="add" data-nis="{{ $s->nis_lokal }}" data-minggu='2' data-kelas="{{ $kelas }}" data-nama="{{ $s->nama_siswa }}" data-bulan="{{ $i }}" data-tahun="{{ $tahun }}" class="btn btn-kas btn-sm btn-modal btn-secondary" style="width: 35px">
                                                ...
                                            </button>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div id="{{ 3 . $kelas . $i . $s->nis_lokal }}" class="klik">
                                        @if (checkKas($s->nama_siswa, 3, $i, $tahun))
                                            <button  data-jenis='hapus' data-nis="{{ $s->nis_lokal }}" data-minggu='3' data-kelas="{{ $kelas }}" data-nama="{{ $s->nama_siswa }}" data-bulan="{{ $i }}" data-tahun="{{ $tahun }}" class="btn btn-kas btn-sm btn-modal btn-secondary" style="width: 35px">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        @else
                                            <button data-jenis="add" data-nis="{{ $s->nis_lokal }}" data-minggu='3' data-kelas="{{ $kelas }}" data-nama="{{ $s->nama_siswa }}" data-bulan="{{ $i }}" data-tahun="{{ $tahun }}" class="btn btn-kas btn-sm btn-modal btn-secondary" style="width: 35px">
                                                ...
                                            </button>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div id="{{ 4 . $kelas . $i . $s->nis_lokal }}" class="klik">
                                        @if (checkKas($s->nama_siswa, 4, $i, $tahun))
                                            <button  data-jenis='hapus' data-nis="{{ $s->nis_lokal }}" data-minggu='4' data-kelas="{{ $kelas }}" data-nama="{{ $s->nama_siswa }}" data-bulan="{{ $i }}" data-tahun="{{ $tahun }}" class="btn btn-kas btn-sm btn-modal btn-secondary" style="width: 35px">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        @else
                                            <button data-jenis="add" data-nis="{{ $s->nis_lokal }}" data-minggu='4' data-kelas="{{ $kelas }}" data-nama="{{ $s->nama_siswa }}" data-bulan="{{ $i }}" data-tahun="{{ $tahun }}" class="btn btn-kas btn-sm btn-modal btn-secondary" style="width: 35px">
                                                ...
                                            </button>
                                        @endif
                                    </div>

                                </td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <input type="hidden" id="token" value="{{ csrf_token() }}">
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript" src="{{asset('dist/js/datatables.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#kas').DataTable({
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: true,
            ordering: false
        })

        $('.klik').on('click', function(){
            let minggu = $(this).find('button').data('minggu')
            let bulan = $(this).find('button').data('bulan')
            let tahun = $(this).find('button').data('tahun')
            let nama = $(this).find('button').data('nama')
            let kelas = $(this).find('button').data('kelas')
            let nis = $(this).find('button').data('nis')
            let token = $('#token').val()
            let jenis = $(this).find('button').data('jenis')
            console.log(jenis)
            if (jenis == 'hapus') {
                $.ajax({
                url: '/kas/submitkas/hapus',
                data: {
                    _token: token,
                    nis: nis,
                    minggu : minggu,
                    bulan : bulan,
                    tahun : tahun,
                    nama : nama,
                    kelas : kelas
                },
                type: 'POST',
                success: function(data){
                    $('#'+minggu+kelas+bulan+nis).html(data)
                }
            })
            } else {
                $.ajax({
                url: '/kas/submitkas',
                data: {
                    _token: token,
                    nis: nis,
                    minggu : minggu,
                    bulan : bulan,
                    tahun : tahun,
                    nama : nama,
                    kelas : kelas
                },
                type: 'POST',
                success: function(data){
                    $('#'+minggu+kelas+bulan+nis).html(data)
                }
            })
            }
        })
    })
</script>
@endsection
