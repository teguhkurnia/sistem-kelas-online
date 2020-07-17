<div class="container">
    <form action="/siswa/upfoto" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <table>
            <tr>
                <th>NIS</th>
                <td>:</td>
                <td>{{ $siswa->nis_lokal }} <input type="text" name="nis_lokal" hidden value="{{ $siswa->nis_lokal }}"></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>:</td>
                <td>{{ $siswa->nama_siswa }}</td>
            </tr>
            <tr>
                <th>Foto</th>
                <td>:</td>
                <td>{{ $siswa->foto }}</td>
            </tr>
            <tr>
                <th colspan="3">
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" name="file" id="file" required>
                        <label class="custom-file-label" for="file">Choose file...</label>
                      </div>
                </th>
                <td><input type="hidden" value="asd"></td>
            </tr>
        </table>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
    </form>
</div>

<script>
    $('.custom-file input').change(function (e) {
        if (e.target.files.length) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
        }
    });
</script>
