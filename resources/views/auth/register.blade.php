@extends('layouts.auth')

@section('content')
<h2>Daftar</h2>
<h5>Silahkan isi formulir dibawah ini.</h5>
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf @method('POST')
    <div class="form-group">
        <label for="nip">NIP*</label>
        <input type="text" name="nip" value="{{ old('nip') }}" class="form-control input-sm" id="nip">
        @error('nip')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="nama">Nama*</label>
        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control input-sm" id="nama">
        @error('nama')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email*</label>
        <input type="text" name="email" value="{{ old('email') }}" class="form-control input-sm" id="email">
        @error('email')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="jabatan_id">Jabatan*</label>
        <select name="jabatan_id" class="form-control input-sm" id="email">
            <option value="">-Silahkan Pilih-</option>
            @foreach ($jabatan as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
        @error('jabatan')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="golongan_id">Golongan*</label>
        <select name="golongan_id" class="form-control input-sm" id="golongan_id">
            <option value="">-Silahkan Pilih-</option>
            @foreach ($golongan as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
        @error('golongan_id')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="unit_kerja_id">Unit Kerja*</label>
        <select name="unit_kerja_id" class="form-control input-sm" id="unit_kerja_id">
            <option value="">-Silahkan Pilih-</option>
            @foreach ($unit_kerja as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
        @error('unit_kerja_id')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="pendidikan_terakhir">Pendidikan Terakhir*</label>
        <select name="pendidikan_terakhir" class="form-control input-sm" id="pendidikan_terakhir">
            <option value="">-Silahkan Pilih-</option>
            <option value="SMA">SMA</option>
            <option value="SMK/Sederajat">SMK/Sederajat</option>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
        </select>
        @error('pendidikan_terakhir')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="bidang_keahlian_id">Bidang Keahlian*</label>
        <select name="bidang_keahlian_id" class="form-control input-sm" id="bidang_keahlian_id">
            <option value="">-Silahkan Pilih-</option>
            @foreach ($bidang_keahlian as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
        @error('bidang_keahlian_id')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="kemampuan_peran">Kemampuan Peran*</label>
        <select name="kemampuan_peran" class="form-control input-sm" id="kemampuan_peran">
            <option value="">-Silahkan Pilih-</option>
            <option value="Instruktur">Instruktur</option>
            <option value="Penyusunan">Penyusunan</option>
            <option value="Narasumber">Narasumber</option>
            <option value="Validator">Validator</option>
            <option value="Desainer">Desainer</option>
            <option value="BPO">BPO</option>
        </select>
        @error('kemampuan_peran')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="kemampuan_slide">Kemampuan Slide*</label>
        <select name="kemampuan_slide" class="form-control input-sm" id="kemampuan_slide">
            <option value="">-Silahkan Pilih-</option>
            <option value="0 - 25%">0 - 25%</option>
            <option value="26 - 50%">26 - 50%</option>
            <option value="51 - 70%">51 - 70%</option>
            <option value="71 - 100%">71 - 100%</option>
        </select>
        @error('kemampuan_slide')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="sertifikat_bidang">Sertifikat Bidang</label>
        <input type="file" name="sertifikat_bidang" class="form-control input-sm" id="sertifikat_bidang">
        <strong>format file .pdf</strong>
    </div>
    <div class="form-group">
        <label for="sertifikat_kompetensi">Sertifikat Kompetensi</label>
        <input type="file" name="sertifikat_kompetensi" class="form-control input-sm" id="sertifikat_kompetensi">
        <strong>format file .pdf</strong>
    </div>
    <div class="form-group">
        <label for="sertifikat_pendukung">Sertifikat Pendukung</label>
        <input type="file" name="sertifikat_pendukung" class="form-control input-sm" id="sertifikat_pendukung">
        <strong>format file .pdf</strong>
    </div>
    <div class="form-group">
        <label class="" for="">Gambar Tanda Tangan</label>
        <br/>
        <div id="sig"></div>
        <br><br>
        <button id="clear" class="btn btn-danger btn-sm" type="submit">Hapus</button>
        <textarea id="signature" name="tanda_tangan" style="display: none"></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm btn-login">
            <span>Simpan</span>
            <i class="fa fa-arrow-right"></i>
        </button>
    </div>

    <div class="link">Sudah Punya Akun? <a href="{{ route('login') }}">Masuk</a></div>
</form>
@endsection


@section('footer-scripts')
<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature").val('');
    });
</script>
@endsection