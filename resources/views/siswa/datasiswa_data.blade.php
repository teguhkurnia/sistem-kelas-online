@foreach ($siswa as $key => $s)
<tr>
    <td>{{$key + $siswa->firstItem()}}</td>
    <td>
        <img style="margin: 0;width: 75px; height: 90px;" src="{{asset('/storage/images/siswa/' . $s->foto)}}" alt="">
    </td>
    <td>
        <strong>{{$s->nis_lokal}}</strong>
        <br>
        {{$s->nama_siswa}}
        <br>
        {{$s->jk}}
        <br>
        <button id="ubahfoto" name="ubahfoto" class="btn btn-primary ubahfoto" data-toggle="modal" data-target="#exampleModal" data-nis="{{ $s->nis_lokal }}"><i class="fas fa-pen"></i> Ubah Foto</button>
    </td>
    <td>{{$s->kelas}}</td>
    <td>{{$s->phone_ortuwali}}</td>
    <td>{{$s->alamat}}</td>
    <td>{{$s->status_siswa}}</td>
    <td>
        <a class="btn btn-success" href="/siswa/export/{{ $s->nis_lokal }}"><i class="far fa-file-excel"></i></a>
        <a class="btn btn-primary" href="/siswa/form/{{ $s->nis_lokal }}"><i class="fas fa-pen"></i></a>
        <a class="btn btn-warning" href="/siswa/detailsiswa/{{ $s->nis_lokal }}"><i class="far fa-eye"></i></a>
        {!! Form::open(['url' => 'siswa/delete/' . $s->nis_lokal, 'method' => 'DELETE']) !!}
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
        {!! Form::close() !!}
    </td>
</tr>
@endforeach
    <tr>
        <td colspan="8">
            {!! $siswa->links() !!}
        </td>
    </tr>
