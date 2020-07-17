<fieldset class="">
    <div class="col-step container mr-auto">
    <div class="step1 justify-content-center">
        <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis_lokal">NIS *</label>
            <input type="text" class="form-control form-control col-md-8 col-sm-8 col-xs-12" id="nis_lokal" name="nis_lokal" value="{{$siswa->nis_lokal}}" {{($siswa->nis_lokal) ? 'readonly' : ''}}>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nisn">NISN *</label>
            <input type="text" class="form-control col-md-8 col-sm-8 col-xs-12" id="nisn" name="nisn" value="{{$siswa->nisn}}">
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_induk">No Induk *</label>
            <input type="text" class="form-control col-md-8 col-sm-8 col-xs-12" id="no_induk" name="no_induk" value="{{$siswa->no_induk}}">
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_siswa">Nama Lengkap *</label>
            <input type="text" class="form-control col-md-8 col-sm-8 col-xs-12" id="nama_siswa" name="nama_siswa" value="{{$siswa->nama_siswa}}">
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">TTL  *</label>
            <input type="text" class="form-control col-12 col-md-3 col-sm-4 col-xs-12" id="tempat_lahir" name="tempat_lahir" value="{{$siswa->tempat_lahir}}">
            <input type="date" class="form-control col-12 mt-1 col-md-5 col-sm-4 col-xs-12" id="tgl_lahir" name="tgl_lahir" value="{{$siswa->tgl_lahir}}">
        </div>
        <div class="form-group row">
            <label for="kelas" class="col-md-3 col-sm-3 col-xs-12">Pilih Kelas *</label>
            <select class="form-control col-md-8 col-sm-8 col-xs-12" id="kelas" name="kelas"">
                <option>-- PILIH KELAS --</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{($k->id == $siswa->kelas) ? 'selected' : ''}}>{{$k->nama_kelas}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group radio-switch row">
            <input type="hidden" id="foto" name="foto" value="{{ $siswa->foto    }}">
            <label for="jk" class="col-md-3 col-sm-3 col-xs-12">Jenis Kelamin / Agama *</label>
            <input type="radio" class="jk" id="radio-one" name="jk" value="Laki-Laki" {{($siswa->jk == 'Laki-Laki') ? 'checked' : ''}}/>
            <label class="btn btn-primary col-5 col-md-2" for="radio-one">Laki-Laki</label>
            <input type="radio" class="jk" id="radio-two" name="jk" value="Perempuan" {{($siswa->jk == 'Perempuan') ? 'checked' : ''}}/>
            <label class="btn btn-primary col-6 col-md-2 ml-0" for="radio-two">Perempuan</label>
            <select class="form-control mt-1 ml-0 col-12 col-md-4 col-sm-5 col-xs-12" id="agama" name="agama" style="margin-left:20px">
                <option value="Islam" {{($siswa->agama == 'Islam') ? 'selected' : ''}}>Islam</option>
                <option value="Hindu" {{($siswa->agama == 'Hindu') ? 'selected' : ''}}>Hindu</option>
                <option value="Kristen" {{($siswa->agama == 'Kristen') ? 'selected' : ''}}>Kristen</option>
                <option value="Konghucu" {{($siswa->agama == 'Konghucu') ? 'selected' : ''}}>Konghucu</option>
                <option value="Budha" {{($siswa->agama == 'Budha') ? 'selected' : ''}}>Budha</option>
            </select>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-md-3 col-sm-3 col-xs-12">Alamat *</label>
            <textarea class="form-control col-md-8 col-sm-8 col-xs-12" id="alamat" rows="3" name="alamat">{{$siswa->alamat}}</textarea>
        </div>
        <div class="form-group row">
            <label for="jarak_rumahsekolah" class="col-md-3 col-sm-3 col-xs-12">Jarak Rumah - Sekolah *</label>
            <input type="number" class="form-control col-md-7 col-sm-7 col-9 col-xs-10" id="jarak_rumahsekolah" name="jarak_rumahsekolah" value="{{$siswa->jarak_rumahsekolah}}">
            <input type="text" class="form-control col-md-1 col-sm-2 col-2 col-xs-1" id="exampleInputEmail1" value="KM" disabled>
        </div>
        <div class="form-group row">
            <label for="kendaraan" class="col-md-3 col-sm-3 col-xs-12">Kendaraan *</label>
            <select class="form-control col-md-8 col-sm-8 col-xs-12" id="kendaraan" name="kendaraan">
                <option value="Jalan Kaki" {{($siswa->kendaraan == 'Jalan Kaki') ? 'selected' : ''}}>Jalan Kaki</option>
                <option value="Sepeda" {{($siswa->kendaraan == 'Sepeda') ? 'selected' : ''}}>Sepeda</option>
                <option value="Sepeda Motor" {{($siswa->kendaraan == 'Sepeda Motor') ? 'selected' : ''}}>Sepeda Motor</option>
                <option value="Mobil" {{($siswa->kendaraan == 'Mobil') ? 'selected' : ''}}>Mobil</option>
                <option value="Angkutan Umum" {{($siswa->kendaraan == 'Angkutan Umum') ? 'selected' : ''}}>Angkutan Umum</option>
            </select>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cita_cita">Cita-Cita / Hobi *</label>
            <input type="text" class="form-control col-md-2 col-sm-2 col-xs-4" id="cita_cita" name="cita_cita" value="{{$siswa->cita_cita}}">
            <input type="text" class="form-control mt-1 col-md-6 col-sm-6 col-xs-8" id="hobi" name="hobi" value="{{$siswa->hobi}}">
        </div>
        <div class="form-group row">
            <label for="jumlah_saudara" class="col-md-3 col-sm-3 col-xs-12">Jumlah Saudara *</label>
            <input type="number" class="form-control col-8 col-md-7 col-sm-7 col-xs-10" id="jumlah_saudara" name="jumlah_saudara" value="{{$siswa->jumlah_saudara}}">
            <input type="text" class="form-control col-3 col-md-1 col-sm-1 col-xs-1" value="Orang" disabled>
        </div>
        <div class="form-group row">
            <label for="status_siswa" class="col-md-3 col-sm-3 col-xs-12">Status Siswa *</label>
            <select class="form-control col-md-8 col-sm-8 col-xs-12" id="status_siswa" name="status_siswa">
                <option value="Siswa Baru" {{($siswa->status_siswa == 'Siswa Baru') ? 'selected' : ''}}>Siswa Baru</option>
                <option value="Pindahan" {{($siswa->status_siswa == 'Pindahan') ? 'selected' : ''}}>Pindahan</option>
            </select>
        </div>
    </div>
</div>
<hr>
    <div class="text-right next">
        <input id="step1" type="button" name="next" class="action-button btn btn-success" value="Next Step"/>
    </div>
</fieldset>
