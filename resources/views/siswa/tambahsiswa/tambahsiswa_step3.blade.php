<fieldset class="">
    <div class="container">
        <h4 class="text-center"> Data Orang Tua </h4>
        <div class="row form-group mx-auto text-left">
            <div class="col-6 col-md-4 offset-md-3">
                <label for="provinsi" class="control-label">Provinsi</label>
                <select name="provinsi" id="provinsi" class="form-control wilayah" data-nama_wilayah="provinsi" data-kab="{{optional(optional($alamatortu))->kabupaten}}" data-kec="{{optional(optional($alamatortu))->kecamatan}}" data-des="{{optional(optional($alamatortu))->desa}}">
                    <option value="null">- Pilih Provinsi -</option>
                    @foreach ($provinsi as $p)
                        @if (isset($alamatortu))
                            <option value="{{$p->id}}" data-id="{{$p->id}}" {{($p->id == optional(optional($alamatortu))->provinsi) ? 'selected' : ''}}>{{$p->nama}}</option>
                        @else

                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-6 col-md-4">
                <label for="kabupaten" class="control-label">Kabupaten</label>
                <select name="kabupaten" id="kabupaten" class="form-control wilayah" data-nama_wilayah="kabupaten">
                    <option value="null">- Pilih Provinsi Dahulu -</option>
                </select>
            </div>
        </div>
        <div class="row form-group mx-auto text-left">
            <div class="col-6 col-md-4 offset-md-3">
                <label for="kecamatan" class="control-label">Kecamatan</label>
                <select name="kecamatan" id="kecamatan" class="form-control wilayah" data-nama_wilayah="kecamatan">
                    <option value="null">- Pilih Kabupaten Dahulu -</option>
                </select>
            </div>
            <div class="col-6 col-md-4">
                <label for="desa" class="control-label">Desa</label>
                <select name="desa" id="desa" class="form-control wilayah" data-nama_wilayah="desa">
                    <option value="null">- Pilih Kecamatan Dahulu -</option>
                </select>
            </div>
        </div>
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kodepos">Kode Pos *</label>
            <input type="text" class="form-control col-md-8 col-sm-8 col-xs-12" id="kodepos" name="kodepos" value="{{optional($alamatortu)->kodepos}}">
        </div>
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nokk">No KK *</label>
            <input type="text" class="form-control col-md-8 col-sm-8 col-xs-12" id="nokk" name="nokk" value="{{optional($alamatortu)->nokk}}">
        </div>
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_ortuwali">Telephone *</label>
            <input type="text" class="form-control col-md-8 col-sm-8 col-xs-12" id="phone_ortuwali" name="phone_ortuwali" value="{{$siswa->phone_ortuwali}}">
        </div>
        <div class="col-md-4 offset-md-5">
            <h5 class="text-center">Ayah</h5>
        </div>
        <div class="row form-group mx-auto">
            <div class="col-6 col-md-4 offset-md-3">
                <input type="text" class="form-control" name="nik_ayah" placeholder="NIK" value="{{optional($siswa->ayah)->nik}}">
            </div>
            <div class="col-6 col-md-4">
                <input type="text" class="form-control" name="nama_ayah" placeholder="Nama" value="{{optional($siswa->ayah)->nama}}">
            </div>
        </div>
        <div class="row form-group mx-auto">
            <div class="col-6 col-md-4 offset-md-3">
                <input type="text" class="form-control" name="pendidikan_ayah" placeholder="Pendidikan" value="{{optional($siswa->ayah)->pendidikan}}">
            </div>
            <div class="col-6 col-md-4">
                <input type="text" class="form-control" name="pekerjaan_ayah" placeholder="Pekerjaan" value="{{optional($siswa->ayah)->pekerjaan}}">
            </div>
        </div>
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_ayah">Tanggal Lahir</label>
            <input type="date" class="form-control col-md-8 col-sm-8 col-xs-12" id="tgl_ayah" name="tgl_ayah" value="{{optional($siswa->ayah)->tgllahir}}">
        </div>
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penghasilan_ayah">Penghasilan</label>
            <select name="penghasilan_ayah" id="penghasilan_ayah" class="form-control col-md-8 col-sm-8 col-xs-12">
                <option value="null">- Pilih Penghasilan -</option>
                <option value="100.000 - 500.000" {{optional($siswa->ayah)->penghasilan == '100.000 - 500.000' ? 'selected' : ''}}>100.000 - 500.000</option>
                <option value="500.000 - 1.000.000" {{optional($siswa->ayah)->penghasilan == '500.000 - 1.000.000' ? 'selected' : ''}}>500.000 - 1.000.000</option>
                <option value="1.000.000 - 1.500.000" {{optional($siswa->ayah)->penghasilan == '1.000.000 - 1.500.000' ? 'selected' : ''}}>1.000.000 - 1.500.000</option>
                <option value="1.500.000 - 2.500.000" {{optional($siswa->ayah)->penghasilan == '1.500.000 - 2.500.000' ? 'selected' : ''}}>1.500.000 - 2.500.000</option>
                <option value="2.500.000 - 5.000.000" {{optional($siswa->ayah)->penghasilan == '2.500.000 - 5.000.000' ? 'selected' : ''}}>2.500.000 - 5.000.000</option>
                <option value="5.000.000 - 10.000.000" {{optional($siswa->ayah)->penghasilan == '5.000.000 - 10.000.000' ? 'selected' : ''}}>5.000.000 - 10.000.000</option>
                <option value="Lebih dari > 10.000.000" {{optional($siswa->ayah)->penghasilan == 'Lebih dari > 10.000.000' ? 'selected' : ''}}>Lebih dari > 10.000.000</option>
            </select>
        </div>
        <div class="row form-group mx-auto">
            <label for="alamat_ayah" class="control-label col-md-3 col-sm-3 col-xs-12 ">Alamat</label>
            <textarea name="alamat_ayah" rows="3" class="form-control col-md-8 col-sm-8 col-xs-12">{{optional($siswa->ayah)->alamat}}</textarea>
        </div>
        <div class="col-md-4 offset-md-5">
            <h5 class="text-center">Ibu</h5>
        </div>
        <div class="row form-group mx-auto">
            <div class="col-6 col-md-4 offset-md-3">
                <input type="text" class="form-control" name="nik_ibu" placeholder="NIK" value="{{optional($siswa->ibu)->nik}}">
            </div>
            <div class="col-6 col-md-4">
                <input type="text" class="form-control" name="nama_ibu" placeholder="Nama" value="{{optional($siswa->ibu)->nama}}">
            </div>
        </div>
        <div class="row form-group mx-auto">
            <div class="col-6 col-md-4 offset-md-3">
                <input type="text" class="form-control" name="pendidikan_ibu" placeholder="Pendidikan" value="{{optional($siswa->ibu)->pendidikan}}">
            </div>
            <div class="col-6 col-md-4">
                <input type="text" class="form-control" name="pekerjaan_ibu" placeholder="Pekerjaan" value="{{optional($siswa->ibu)->pekerjaan}}">
            </div>
        </div>
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_ibu">Tanggal Lahir</label>
            <input type="date" class="form-control col-md-8 col-sm-8 col-xs-12" id="tgl_ibu" name="tgl_ibu" value="{{optional($siswa->ibu)->tgllahir}}">
        </div>
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penghasilan_ibu">Penghasilan</label>
            <select name="penghasilan_ibu" id="penghasilan_ibu" class="form-control col-md-8 col-sm-8 col-xs-12">
                <option value="null">- Pilih Penghasilan -</option>
                <option value="100.000 - 500.000" {{optional($siswa->ibu)->penghasilan == '100.000 - 500.000' ? 'selected' : ''}}>100.000 - 500.000</option>
                <option value="500.000 - 1.000.000" {{optional($siswa->ibu)->penghasilan == '500.000 - 1.000.000' ? 'selected' : ''}}>500.000 - 1.000.000</option>
                <option value="1.000.000 - 1.500.000" {{optional($siswa->ibu)->penghasilan == '1.000.000 - 1.500.000' ? 'selected' : ''}}>1.000.000 - 1.500.000</option>
                <option value="1.500.000 - 2.500.000" {{optional($siswa->ibu)->penghasilan == '1.500.000 - 2.500.000' ? 'selected' : ''}}>1.500.000 - 2.500.000</option>
                <option value="2.500.000 - 5.000.000" {{optional($siswa->ibu)->penghasilan == '2.500.000 - 5.000.000' ? 'selected' : ''}}>2.500.000 - 5.000.000</option>
                <option value="5.000.000 - 10.000.000" {{optional($siswa->ibu)->penghasilan == '5.000.000 - 10.000.000' ? 'selected' : ''}}>5.000.000 - 10.000.000</option>
                <option value="Lebih dari > 10.000.000" {{optional($siswa->ibu)->penghasilan == 'Lebih dari > 10.000.000' ? 'selected' : ''}}>Lebih dari > 10.000.000</option>
            </select>
        </div>
        <div class="row form-group mx-auto">
            <label for="alamat_ibu" class="control-label col-md-3 col-sm-3 col-xs-12 ">Alamat</label>
            <textarea name="alamat_ibu" rows="3" class="form-control col-md-8 col-sm-8 col-xs-12">{{optional($siswa->ibu)->alamat}}</textarea>
        </div>
        <div class="col-md-4 offset-md-5">
            <h5 class="text-center">Wali</h5>
        </div>
        <div class="row form-group mx-auto">
            <div class="col-6 col-md-4 offset-md-3">
                <input type="text" class="form-control" name="nik_wali" placeholder="NIK" value="{{optional($siswa->wali)->nik}}">
            </div>
            <div class="col-6 col-md-4">
                <input type="text" class="form-control" name="nama_wali" placeholder="Nama" value="{{optional($siswa->wali)->nama}}">
            </div>
        </div>
        <div class="row form-group mx-auto">
            <div class="col-6 col-md-4 offset-md-3">
                <input type="text" class="form-control" name="pendidikan_wali" placeholder="Pendidikan" value="{{optional($siswa->wali)->pendidikan}}">
            </div>
            <div class="col-6 col-md-4">
                <input type="text" class="form-control" name="pekerjaan_wali" placeholder="Pekerjaan" value="{{optional($siswa->wali)->pekerjaan}}">
            </div>
        </div>
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_wali">Tanggal Lahir</label>
            <input type="date" class="form-control col-md-8 col-sm-8 col-xs-12" id="tgl_wali" name="tgl_wali" value="{{optional($siswa->wali)->tgllahir}}">
        </div>
        <div class="row form-group mx-auto">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penghasilan_wali">Penghasilan</label>
            <select name="penghasilan_wali" id="penghasilan_wali" class="form-control col-md-8 col-sm-8 col-xs-12">
                <option value="null">- Pilih Penghasilan -</option>
                <option value="100.000 - 500.000" {{optional($siswa->wali)->penghasilan == '100.000 - 500.000' ? 'selected' : ''}}>100.000 - 500.000</option>
                <option value="500.000 - 1.000.000" {{optional($siswa->wali)->penghasilan == '500.000 - 1.000.000' ? 'selected' : ''}}>500.000 - 1.000.000</option>
                <option value="1.000.000 - 1.500.000" {{optional($siswa->wali)->penghasilan == '1.000.000 - 1.500.000' ? 'selected' : ''}}>1.000.000 - 1.500.000</option>
                <option value="1.500.000 - 2.500.000" {{optional($siswa->wali)->penghasilan == '1.500.000 - 2.500.000' ? 'selected' : ''}}>1.500.000 - 2.500.000</option>
                <option value="2.500.000 - 5.000.000" {{optional($siswa->wali)->penghasilan == '2.500.000 - 5.000.000' ? 'selected' : ''}}>2.500.000 - 5.000.000</option>
                <option value="5.000.000 - 10.000.000" {{optional($siswa->wali)->penghasilan == '5.000.000 - 10.000.000' ? 'selected' : ''}}>5.000.000 - 10.000.000</option>
                <option value="Lebih dari > 10.000.000" {{optional($siswa->wali)->penghasilan == 'Lebih dari > 10.000.000' ? 'selected' : ''}}>Lebih dari > 10.000.000</option>
            </select>
        </div>
        <div class="row form-group mx-auto">
            <label for="alamat_wali" class="control-label col-md-3 col-sm-3 col-xs-12 ">Alamat</label>
            <textarea name="alamat_wali" rows="3" class="form-control col-md-8 col-sm-8 col-xs-12">{{optional($siswa->wali)->alamat}}</textarea>
        </div>
    </div>
    <input type="button" name="next" class="next float-right action-button btn btn-success" value="Next Step" />
        <input type="button" name="previous" class="previous float-right action-button-previous btn btn-secondary" value="Previous" />
</fieldset>
