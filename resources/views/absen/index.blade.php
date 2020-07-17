@extends('main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Absen</h3>
            <hr>

            {!! Form::open(['url' => '/absen/showabsen', 'method' => 'post']) !!}
                @csrf
                <div class="container justify-content-center col-md-6">
                    <div class="">
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-sm-4 col-md-4">
                                    <label class="form-label" for="mapel">Pilih Mata Pelajaran</label>
                                </div>
                                <div class="col-sm-8 col-md-8">
                                    <select class="form-control" name="mapel" id="mapel">
                                        <option value="kosong">- Pilih Mapel -</option>
                                        @foreach ($mapel as $m)
                                            <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="show_kelas"></div>
                        <div class="row justify-content-center">
                            <a class="btn btn-secondary" id="lanjut" hidden data-toggle="modal" data-target="#showmodal">Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="showmodal" tabindex="-1" role="dialog" aria-labelledby="modallabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modallabel">Pilih Jenis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <select name="jenisabsen" id="jenisabsen" class="form-control">
                                    <option value="now">Absen Hari Ini</option>
                                    <option value="absenbulanan">Absen Bulanan</option>
                                    <option value="rekapabsen">Rekap Absen</option>
                                </select>
                                <div id="showtgl" hidden>
                                    <select name="tahunabsen" id="tahunabsen" class="form-control">
                                        <option value="{{date('Y')}}" selected>- Pilih Tahun -</option>
                                        @for ($i = 2018; $i <= date('Y'); $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="bulanabsen" id="bulanabsen" class="form-control">
                                        <option value="{{date('m')}}" selected>- Pilih Bulan -</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </div>
        </div>
        {!! Form::close() !!}
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#mapel').on('change', function(){
                if($(this).find('option:selected').val() == 'kosong'){
                    $('#show_kelas').html('')
                }else{
                    $.ajax({
                        url: '/absen/showkelas',
                        success: function(data){
                            $('#show_kelas').html(data)
                        }
                    })
                }
            })

            $('#show_kelas').on('change', function(){
                if ($(this).find('option:selected').val() !== 'kosong' && $('#mapel').find('option:selected').val() !== 'kosong') {
                    $('a[id=lanjut]').attr('hidden', false)
                }
            })

            $('#jenisabsen').on('change', function () {
                if ($(this).find('option:selected').val() == 'now') {
                    $('#showtgl').attr('hidden', true)
                    $('form').attr('action', '/absen/showabsen')
                }else if($(this).find('option:selected').val() == 'absenbulanan'){
                    $('#showtgl').attr('hidden', false)
                    $('form').attr('action', '/absen/showabsenbulan')
                }else{
                    $('#showtgl').attr('hidden', false)
                    $('form').attr('action', '/absen/rekapabsen')
                }
            })

        })
    </script>
@endsection
