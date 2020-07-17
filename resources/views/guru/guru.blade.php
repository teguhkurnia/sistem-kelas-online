@extends('main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Tabel Data Guru</h2>
            <hr>

            @foreach ($guru as $key => $g)
                <div class="col col-sm-4 col-md-4 float-left">
                    <div class="card" style=" overflow-hidden">
                        <div class="card-body" style="min-height: 360px">
                            <div class="row justify-content-between">
                                <div class="col col-sm-4 col-md-4">
                                    <h4 class="card-text">No : {{ $key + $guru->firstItem() }}</h4>
                                </div>
                                <div class="col col-sm-7 col-md-7">
                                    <h4 class="card-text">{{ $g->nip }}</h4>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-7 col-md-7">
                                    <h3 class="card-text">{{ $g->nama_guru }}</h3>
                                    <p>
                                        {{ $g->jenis_ptk . ' / ' . $g->jenjang_pendidikan . ' / ' . $g->agama .' / ' . $g->jk}}
                                    </p>
                                    <ul>
                                        <li style="list-style: none"><i class="fab fa-whatsapp"></i> {{ $g->no_hp }}</li>
                                        <li style="list-style: none"><i class="fas fa-home"></i> {{ $g->alamat }}</li>
                                    </ul>
                                </div>
                                <div class="col col-md-5 col-sm-5 p-0 d-none d-md-block">
                                 <img src="{{asset('/storage/images/guru/'. $g->foto )}}" alt="Foto Guru" style="width: 125px; height: 150px;">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row justify-content-between">
                                <div class="col col-md-7 col-sm-7">
                                    <a href="" class="btn btn-success"><i class="far fa-file-excel"></i></a>
                                    <a href="" class="btn btn-secondary"><i class="fas fa-pen"></i></a>
                                    <a href="" class="btn btn-warning"><i class="far fa-eye"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                                <div class="col col-md-4 col-sm-4">
                                    <a href="" class="btn btn-primary">Edit Foto</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex">
            <div class="mx-auto">
                {!! $guru->links() !!}
            </div>
        </div>
    </div>
@endsection
