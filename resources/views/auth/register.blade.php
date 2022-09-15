@extends('layouts.auth')

@section('content')
<h2>Daftar</h2>
<h5>Silahkan isi formulir dibawah ini.</h5>
<form method="POST" action="{{ route('login') }}">
    @csrf
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
        </select>
        @error('pendidikan_terakhir')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="bidang_id">Bidang Keahlian*</label>
        <select name="bidang_id" class="form-control input-sm" id="bidang_id">
            <option value="">-Silahkan Pilih-</option>
        </select>
        @error('bidang_id')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="kemampuan_peran">Kemampuan Peran*</label>
        <select name="kemampuan_peran" class="form-control input-sm" id="kemampuan_peran">
            <option value="">-Silahkan Pilih-</option>
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
        @error('sertifikat_bidang')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="sertifikat_kompetensi">Sertifikat Kompetensi</label>
        <input type="file" name="sertifikat_kompetensi" class="form-control input-sm" id="sertifikat_kompetensi">
        @error('sertifikat_kompetensi')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="sertifikat_pendukung">Sertifikat Pendukung</label>
        <input type="file" name="sertifikat_pendukung" class="form-control input-sm" id="sertifikat_pendukung">
        @error('sertifikat_kompetensi')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="tanda_tangan">Tanda Tangan</label>
        <input type="file" name="tanda_tangan" class="form-control input-sm" id="tanda_tangan">
        @error('tanda_tangan')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button class="btn btn-primary btn-login">
        <span>Daftar</span>
        <i class="fa fa-arrow-right"></i>
    </button>
    <div class="link">Sudah Punya Akun? <a href="{{ route('login') }}">Masuk</a></div>
</form>
@endsection
