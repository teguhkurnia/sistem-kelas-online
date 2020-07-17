@extends('main')

@section('content')
    <d class="card">
        <div class="card-body">
            <h3 class="card-title">Absen</h3>
            <hr>

            {!! Form::open(['url' => '/kas/showkas', 'method' => 'post']) !!}
                @csrf
                <div class="container justify-content-center col-md-6">
                    <div class="kelas form-group">
                        <div class="">
                            <label for="kelas" class="form-lable col-md-3">Kelas</label>
                            <select name="kelas" id="kelas" class="form-control col-md-8 mb-3">
                                <option value="kosong">- PILIH KELAS -</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="tahun" hidden>
                            <label for="tahun" class="form-lable col-md-3">Tahun</label>
                            <select name="tahun" id="tahun" class="form-control col-md-8 mb-3">
                                <option value="kosong">Pilih Tahun</option>
                                @for ($i = 2019; $i <= date('Y'); $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-secondary" id="lanjut" hidden>Lanjut</button>
                        </div>
                    </div>
                </div>
        </div>
        {!! Form::close() !!}
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#kelas').on('change', function(){
                if ($(this).find('option:selected').val() !== 'kosong') {
                    $('.tahun').attr('hidden', false)
                }else{
                    $('.tahun').attr('hidden', true)
                }
            })
            $('#tahun').on('change', function(){
                if($('#kelas').find('option:selected').val() !== 'kosong' && $(this).find('option:selected').val() !== 'kosong'){
                $('button[type=submit]').attr('hidden', false)
            }else {
                $('button[type=submit]').attr('hidden', true)
            }
            })
        })
    </script>
@endsection
