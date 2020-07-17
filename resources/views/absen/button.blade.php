@if ($data['kehadiran'] == '1')

    <button data-toggle="modal" data-jenis="edit" data-target="#absenday{{$data['tgl'] . $data['nis']}}" class="btn btn-sm btn-modal btn-success" data-nis="{{$data['nis']}}" data-nama="{{$data['nama']}}"
        data-kelas="{{$data['kelas']}}" data-tgl="{{$data['tgl']}}" data-month="{{date('m')}}" data-year="{{$data['tahun']}}" style="width: 35px">
        <i class="fas fa-check"></i>
    </button>

@elseif($data['kehadiran'] == '2')

    <button data-toggle="modal" data-jenis="edit" data-target="#absenday{{$data['tgl'] . $data['nis']}}" class="btn btn-sm btn-modal btn-warning" data-nis="{{$data['nis']}}" data-nama="{{$data['nama']}}"
        data-kelas="{{$data['kelas']}}" data-tgl="{{$data['tgl']}}" data-month="{{$data['bulan']}}" data-year="{{$data['tahun']}}" style="width: 35px">
        <i class="fas fa-clock"></i>
    </button>

@elseif($data['kehadiran'] == '3')

    <button data-toggle="modal" data-jenis="edit" data-target="#absenday{{$data['tgl'] . $data['nis']}}" class="btn btn-sm btn-modal btn-info" data-nis="{{$data['nis']}}" data-nama="{{$data['nama']}}"
        data-kelas="{{$data['kelas']}}" data-tgl="{{$data['tgl']}}" data-month="{{$data['bulan']}}" data-year="{{$data['tahun']}}" style="width: 35px">
        <i class="fas fa-plus-square"></i>
    </button>

@elseif($data['kehadiran'] == '4')
    <button data-toggle="modal" data-jenis="edit" data-target="#absenday{{$data['tgl'] . $data['nis']}}" class="btn btn-sm btn-modal btn-primary" data-nis="{{$data['nis']}}" data-nama="{{$data['nama']}}"
        data-kelas="{{$data['kelas']}}" data-tgl="{{$data['tgl']}}" data-month="{{$data['bulan']}}" data-year="{{$data['tahun']}}" style="width: 35px">
        <i class="fas fa-envelope"></i>
    </button>

@elseif($data['kehadiran'] == '5')

    <button data-toggle="modal" data-target="#absenday{{$data['tgl'] . $data['nis']}}" class="btn btn-sm btn-modal btn-danger" data-nis="{{$data['nis']}}" data-nama="{{$data['nama']}}"
        data-kelas="{{$data['kelas']}}" data-tgl="{{$data['tgl']}}" data-month="{{$data['bulan']}}" data-year="{{$data['tahun']}}" style="width: 35px">
        <i class="fas fa-close"></i>
    </button>

@else

    <button data-toggle="modal" data-jenis="edit" data-target="#absenday{{$data['tgl'] . $data['nis']}}" class="btn btn-sm btn-modal btn-secondary" data-nis="{{$data['nis']}}" data-nama="{{$data['nama']}}"
        data-kelas="{{$data['kelas']}}" data-tgl="{{$data['tgl']}}" data-month="{{$data['bulan']}}" data-year="{{$data['tahun']}}" style="width: 35px">
        ...
    </button>

@endif
