<div class="form-group">
    <div class="row">
        <div class="col-sm-4 col-md-4">
            <label class="form-label" for="kelas">Pilih Mata Kelas</label>
        </div>
        <div class="col-sm-8 col-md-8">
            <select class="form-control" name="kelas" id="kelas">
                <option value="kosong">- Pilih Kelas -</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
