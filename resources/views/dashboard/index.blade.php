@extends('main')
@section('css')
<link rel="stylesheet" href="{{ asset('dist/css/Chart.min.css') }}">
<script type="text/javascript" src="{{ asset('dist/js/Chart.bundle.min.js') }}"></script>
@endsection
@section('content')
    <div class="card">
        <div class="card-body text-center">
            <h4>Selamat Datang {{ auth()->user()->name }},</h4>
        <h3 id="time">{{ now('Asia/Jakarta')->format('h:i:s a, l - d F Y') }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="icon float-right"><i class="fa fa-user display-1"></i></div>
                    <h1 class="card-title">{{ $siswa }}</h1>
                    <h4 class="card-text mb-0">Siswa</h4>
                    <p class="mb-0"><a href="/siswa">Lebih Lengkap</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="icon float-right display-1"><i class="fas fa-user-graduate"></i></div>
                    <h1 class="card-title">{{ $guru }}</h1>
                    <h4 class="card-text mb-0">Guru</h4>
                    <p class="mb-0"><a href="/guru">Lebih Lengkap</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="icon float-right"><i class="fa fa-file-alt display-1"></i></div>
                    <h1 class="card-title">{{ $kelas }}</h1>
                    <h4 class="card-text mb-0">Kelas</h4>
                    <p class="mb-0"><a href="/kelas">Lebih Lengkap</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Title</h5>
            <canvas id="myChart" class="vh-50"></canvas>
        </div>
    </div>
@endsection

@section('js')
<script>
    let data = $.getJSON('/api/kas/8/2020', function (datas) {
        data = datas
    });

    $(document).ready(function () {
        var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        responsive: true,
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: '# Total Kas',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    })
</script>


<script src="{{asset('dist/js/moment-with-locales.js')}}"></script>
<script type="text/javascript">
    function update() {
        moment.locale('id');
        $('#time').html(moment().format('hh:mm:ss A", dddd - MMMM DD YYYY'));
    }
    setInterval(update, 1000);
</script>
@endsection
