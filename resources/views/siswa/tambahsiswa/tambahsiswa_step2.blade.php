<fieldset class="text-left">
    <div class="container">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sekolah_asal">Nama Sekolah Asal *</label>
            <input type="text" class="form-control col-md-8 col-sm-8 col-xs-12" id="sekolah_asal" name="sekolah_asal" value="{{optional(optional($siswa->sekolahasal))->sekolah_asal}}">
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_sekolahasal">Jenis Sekolah Asal *</label>
            <select class="form-control col-md-8 col-sm-8 col-xs-12" id="jenis_sekolahasal" name="jenis_sekolahasal">
                <option value="Sekolah Nasional" {{(optional($siswa->sekolahasal)->jenis_sekolahasal == 'Sekolah Nasional') ? 'selected' : ''}}>Sekolah Nasional</option>
                <option value="Sekolah Nasional Plus" {{(optional($siswa->sekolahasal)->jenis_sekolahasal == 'Sekolah Nasional Plus') ? 'selected' : ''}}>Sekolah Nasional Plus</option>
                <option value="Sekolah Internasional" {{(optional($siswa->sekolahasal)->jenis_sekolahasal == 'Sekolah Internasional') ? 'selected' : ''}}>Sekolah Internasional</option>
                <option value="Sekolah Alam" {{(optional($siswa->sekolahasal)->jenis_sekolahasal == 'Sekolah Alam') ? 'selected' : ''}}>Sekolah Alam</option>
                <option value="Madrasah" {{(optional($siswa->sekolahasal)->jenis_sekolahasal == 'Madrasah') ? 'selected' : ''}}>Madrasah</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status_sekolahasal">Status Sekolah Asal *</label>
            <select class="form-control col-md-8 col-sm-8 col-xs-12" id="status_sekolahasal" name="status_sekolahasal">
                <option>Akreditasi</option>
                <option value="A" {{(optional($siswa->sekolahasal)->status_sekolahasal == 'A') ? 'selected' : ''}}>A</option>
                <option value="B" {{(optional($siswa->sekolahasal)->status_sekolahasal == 'B') ? 'selected' : ''}}>B</option>
                <option value="C" {{(optional($siswa->sekolahasal)->status_sekolahasal == 'C') ? 'selected' : ''}}>C</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kabupaten_sekolahasal">Kabupaten Sekolah Asal *</label>
            <input type="text" class="form-control col-md-8 col-sm-8 col-xs-12" id="kabupaten_sekolahasal" name="kabupaten_sekolahasal" value="{{optional($siswa->sekolahasal)->kabupaten_sekolahasal}}">
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_ujiansebelumnya">No Ujian Sebelumnya *</label>
            <input type="text" class="form-control col-md-8 col-sm-8 col-xs-12" id="no_ujiansebelumnya" name="no_ujiansebelumnya" value="{{optional($siswa->sekolahasal)->no_ujiansebelumnya}}">
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="npsn_sekolahasal">NPSN Sekolah Sebelumnya *</label>
            <input type="text" class="form-control col-md-8 col-sm-8 col-xs-12" id="npsn_sekolahasal" name="npsn_sekolahasal" value="{{optional($siswa->sekolahasal)->npsn_sekolahasal}}">
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blanko_skhunasal">Blanko SKHU Sebelumnya *</label>
            <input type="text" class="form-control col-md-8 col-sm-8 col-xs-12" id="blanko_skhunasal" name="blanko_skhunasal" value="{{optional($siswa->sekolahasal)->blanko_skhunasal}}">
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_ijazahasal">No Ijazah Sebelumnya *</label>
            <input type="text" class="form-control col-md-8 col-sm-8 col-xs-12" id="no_ijazahasal" name="no_ijazahasal" value="{{optional($siswa->sekolahasal)->no_ijazahasal}}">
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nilai_un">Nilai UN Sebelumnya *</label>
            <input type="text" class="form-control col-md-8 col-sm-8 col-xs-12" id="nilai_un" name="nilai_un" value="{{optional($siswa->sekolahasal)->nilai_un}}">
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_kelulusan">Tanggal Kelulusan *</label>
            <input type="date" class="form-control col-md-8 col-sm-8 col-xs-12" id="tgl_kelulusan" name="tgl_kelulusan" value="{{optional($siswa->sekolahasal)->tgl_kelulusan}}">
        </div>
    </div>
    <hr>
        <input type="button" name="next" class="next float-right action-button btn btn-success" value="Next Step" />
        <input type="button" name="previous" class="previous float-right action-button-previous btn btn-secondary" value="Previous" />
</fieldset>
