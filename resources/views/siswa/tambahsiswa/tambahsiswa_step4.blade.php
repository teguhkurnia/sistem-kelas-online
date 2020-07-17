<fieldset class="">
    <div class="container">
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_kks">No KKS / KPS</label>
            <input type="number" class="form-control col-md-8 col-sm-8 col-xs-12" id="no_kks" name="no_kks" value="{{$siswa->no_kks}}">
        </div>
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_kph">No KPH</label>
            <input type="number" class="form-control col-md-8 col-sm-8 col-xs-12" id="no_kph" name="no_kph" value="{{$siswa->no_kph}}">
        </div>
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_kip">No KIP</label>
            <input type="number" class="form-control col-md-8 col-sm-8 col-xs-12" id="no_kip" name="no_kip" value="{{$siswa->no_kip}}">
        </div>
        <div class="col-md-4 offset-md-5">
            <h5 class="text-center">Program Indonesia Pintar</h5>
        </div>
        <div class="row form-group mx-auto">
            <div class="col-6 col-md-4 offset-md-3">
                <input type="text" class="form-control" name="pid_status_penerima" placeholder="Status Penerima" value="{{$siswa->pdi_status_penerima}}">
            </div>
            <div class="col-6 col-md-4">
                <input type="text" class="form-control" name="pid_periode" placeholder="Periode" value="{{$siswa->pdi_periode}}">
            </div>
        </div>
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_kip">Alasan Menerima PIP</label>
            <textarea name="pid_alasan_penerima" id="pid_alasan_penerima" rows="3" class="form-control col-md-8 col-sm-8 col-xs-12" >{{$siswa->pdi_alasan_menerima}}</textarea>
        </div>
        <div class="col-md-4 offset-md-5">
            <h5 class="text-center">Prestasi Tertinggi Yang Pernah Diraih</h5>
        </div>
        <div class="row form-group mx-auto">
            <div class="col-6 col-md-4 offset-md-3">
                <input type="text" class="form-control" name="bidang_prestasi" placeholder="Bidang Prestasi" value="{{$siswa->bidang_prestasi}}">
            </div>
            <div class="col-6 col-md-4">
                <input type="text" class="form-control" name="peringkat_prestasi" placeholder="Peringkat Prestasi" value="{{$siswa->peringkat_prestasi}}">
            </div>
        </div>
        <div class="row form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tingkat_prestasi">Tingkat</label>
            <select name="tingkat_prestasi" id="tingkat_prestasi" class="form-control col-md-8 col-sm-8 col-xs-12">
                <option value="">- Pilih Tingkat -</option>
                <option value="Kecamatan" {{$siswa->tingkat_prestasi == 'Kecamatan' ? 'selected' : ''}}>Kecamatan</option>
                <option value="Kabupaten" {{$siswa->tingkat_prestasi == 'Kabupaten' ? 'selected' : ''}}>Kabupaten</option>
                <option value="Provinsi" {{$siswa->tingkat_prestasi == 'Provinsi' ? 'selected' : ''}}>Provinsi</option>
                <option value="Nasional" {{$siswa->tingkat_prestasi == 'Nasional' ? 'selected' : ''}}>Nasional</option>
                <option value="Internasional" {{$siswa->tingkat_prestasi == 'Internasional' ? 'selected' : ''}}>Internasional</option>
            </select>
        </div>
        <div class="row form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_prestasi">Tahun Prestasi</label>
            <select name="tahun_prestasi" id="tahun_prestasi" class="form-control col-md-8 col-sm-8 col-xs-12">
                <option value="">- Pilih Tahun -</option>
                @for ($i = 2010; $i <= getdate()['year']; $i++)
                    <option value="{{ $i }}" {{$siswa->tahun_prestasi == $i ? 'selected' : ''}}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="col-md-4 offset-md-5">
            <h5 class="text-center">Beasiswa</h5>
        </div>
        <div class="row form-group mx-auto">
            <div class="col-6 col-md-4 offset-md-3">
                <input type="text" class="form-control" name="status_beasiswa" placeholder="Status Beasiswa" value="{{$siswa->status_beasiswa}}">
            </div>
            <div class="col-6 col-md-4">
                <input type="text" class="form-control" name="sumber_beasiswa" placeholder="Sumber Beasiswa" value="{{$siswa->sumber_beasiswa}}">
            </div>
        </div>
        <div class="row form-group mx-auto">
            <div class="col-6 col-md-4 offset-md-3">
                <input type="text" class="form-control" name="jenis_beasiswa" placeholder="Jenis Beasiswa" value="{{$siswa->jenis_beasiswa}}">
            </div>
            <div class="col-6 col-md-4">
                <input type="text" class="form-control" name="jangka_waktu_beasiswa" placeholder="Jangka Waktu Beasiswa" value="{{$siswa->jangka_waktu_beasiswa}}">
            </div>
        </div>
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="besar_uang_beasiswa">Besar Uang Beasiswa</label>
            <input type="number" class="form-control col-md-8 col-sm-8 col-xs-12" id="besar_uang_beasiswa" name="besar_uang_beasiswa" value="{{$siswa->besar_uang_beasiswa}}">
        </div>

        <input type="submit" name="next" class="next float-right action-button btn btn-success" value="Finish" />
        <input type="button" name="previous" class="previous float-right action-button-previous btn btn-secondary" value="Previous" />
    </div>
</fieldset>
