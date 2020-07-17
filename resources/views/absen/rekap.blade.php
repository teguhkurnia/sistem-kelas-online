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

                                                    <button  class="btn btn-sm btn-modal btn-success" style="width: 35px">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                @elseif($kehadiran->kehadiran == 2)

                                                    <button class="btn btn-sm btn-modal btn-warning" style="width: 35px">
                                                        <i class="fas fa-clock"></i>
                                                    </button>

                                                @elseif($kehadiran->kehadiran == 3)

                                                    <button class="btn btn-sm btn-modal btn-info" style="width: 35px">
                                                        <i class="fas fa-plus-square"></i>
                                                    </button>

                                                @elseif($kehadiran->kehadiran == 4)
                                                    <button class="btn btn-sm btn-modal btn-primary" style="width: 35px">
                                                        <i class="fas fa-envelope"></i>
                                                    </button>

                                                @elseif($kehadiran->kehadiran == 5)

                                                    <button class="btn btn-sm btn-modal btn-danger" style="width: 35px">
                                                        <i class="fas fa-close"></i>
                                                    </button>
                                                    @else

                                                        <button class="btn btn-sm btn-modal btn-secondary" style="width: 35px">
                                                            ...
                                                        </button>
                                                @endif
                                            @else

                                                <button class="btn btn-sm btn-modal btn-secondary" style="width: 35px">
                                                    ...
                                                </button>

                                            @endif
                                        @endif
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
    })
</script>
@endsection
