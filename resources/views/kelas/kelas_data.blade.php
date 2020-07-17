    @foreach ($kelas as $key => $k)
        <tr>
            <td>{{$key + $kelas->firstItem()}}</td>
            <td>{{ $k->nama_kelas }}</td>
            <td>{{ $k->tingkat }}</td>
            <td>{{ jumlah_siswa_perkelas($k->id) }}</td>
            <td>{{ $k->wali_kelas }}</td>
            <td>
                <a href="" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>
                <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
            </td>
        </tr>
    @endforeach
        <tr>
            <td colspan="6">{!! $kelas->links() !!}</td>
        </tr>
