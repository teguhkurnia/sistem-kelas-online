<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('')}}assets/icons/font-awesome/css/all.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .container{
            margin-top: 10%;
        }
        .main-card{
            min-height: 400px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card main-card">
            <div class="card-body">
                <div class="card">
                    <div class="card-body text-center">
                        <h4>Selamat Datang,</h4>
                    <h3 id="time">{{ now('Asia/Jakarta')->format('h:i:s a, l - d F Y') }}</h3>
                    </div>
                </div>
                <div class="mt-1 text-center">
                    <h1>Absen Sekarang</h1>
                    <h2>Kelas : {{ $kelassekarang }}</h2>
                    <a class="text-primary" data-toggle="modal" data-target="#showmodalkelas" style="cursor: pointer">Ganti Kelas?</a>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <div class="card shadow text-white" style="background: linear-gradient(to right, #c021ff, #d467ff); border: none;">
                            <div class="card-body">
                                <div class="icon float-right"><i class="fas fa-plus-square display-4"></i></div>
                                <h3 class="card-title mb-0">{{ $sakit->count() }}</h3>
                                <p class="card-text">Sakit</p>
                                <a data-toggle="modal" data-target="#showmodalsakit" class="text-white detail" style="cursor: pointer">Lihat Siswa <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="card shadow text-white" style="background: linear-gradient(to right, #3324ff, #686af8e8); border: none;">
                            <div class="card-body">
                                <div class="icon float-right"><i class="fas fa-envelope display-4"></i></div>
                                <h3 class="card-title mb-0">{{ $izin->count() }}</h3>
                                <p class="card-text">Izin</p>
                                <a data-toggle="modal" data-target="#showmodalizin" class="text-white detail" style="cursor: pointer">Lihat Siswa <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="card shadow text-white" style="background: linear-gradient(to right, #d8f000, #bfff0e); border: none;">
                            <div class="card-body">
                                <div class="icon float-right"><i class="fas fa-clock display-4"></i></div>
                                <h3 class="card-title mb-0">{{ $terlambat->count() }}</h3>
                                <p class="card-text">Terlambat</p>
                                <a data-toggle="modal" data-target="#showmodalterlambat" class="text-white detail" style="cursor: pointer">Lihat Siswa <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="card shadow text-white" style="background: linear-gradient(to right, #f82649, #ff6767ee); border: none;">
                            <div class="card-body">
                                <div class="icon float-right"><i class="fas fa-times-circle display-4"></i></div>
                                <h3 class="card-title mb-0">{{ $alpa->count() }}</h3>
                                <p class="card-text">Tidak Hadir</p>
                                <a data-toggle="modal" data-target="#showmodalalpa" class="text-white detail" style="cursor: pointer">Lihat Siswa <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="showmodalsakit" tabindex="-1" role="dialog" aria-labelledby="modallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="modallabel">Sakit</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach ($sakit as $s)
                        <li class="list-group-item">{{ $s->siswa->nama_siswa }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="showmodalizin" tabindex="-1" role="dialog" aria-labelledby="modallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="modallabel">Izin</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach ($izin as $i)
                        <li class="list-group-item">{{ $i->siswa->nama_siswa }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="showmodalterlambat" tabindex="-1" role="dialog" aria-labelledby="modallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="modallabel">Terlambat</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach ($terlambat as $t)
                        <li class="list-group-item">{{ $t->siswa->nama_siswa }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="showmodalalpa" tabindex="-1" role="dialog" aria-labelledby="modallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="modallabel">Tidak Hadir</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach ($alpa as $a)
                        <li class="list-group-item">{{ $a->siswa->nama_siswa }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="showmodalkelas" tabindex="-1" role="dialog" aria-labelledby="modallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="modallabel">Ganti Kelas</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <select id="kelas" class="form-control">
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}" {{ ($k->nama_kelas == $kelassekarang) ? 'selected' : ''}}>{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>

</body>

<script src="{{asset('dist/js/moment-with-locales.js')}}"></script>
<script src="{{asset('')}}assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    function update() {
        moment.locale('id');
        $('#time').html(moment().format('hh:mm:ss A", dddd - MMMM DD YYYY'));
    }
    setInterval(update, 1000);
</script>

<script src="{{asset('')}}assets/node_modules/popper/popper.min.js"></script>
<script src="{{asset('')}}assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $('#kelas').on('change', function(){
            let kelas = $(this).val()
            window.location.href = '/whoisabsent/'+kelas
        })
    })
</script>
</html>
