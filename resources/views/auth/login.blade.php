@extends('layouts.auth')

@section('content')
<h2>Masuk</h2>
<h5>Silahkan masuk terlebih dahulu untuk melanjutkan.</h5>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" value="{{ old('email') }}" class="form-control input-sm" id="email">
        @error('email')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" value="{{ old('password') }}" class="form-control input-sm" id="password">
        @error('password')
            <span class="invalid-feedback" role="alert" style="color: #ee1818">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button class="btn btn-primary btn-login">
        <span>Simpan</span>
        <i class="fa fa-arrow-right"></i>
    </button>
    <div class="link">Belum Punya Akun? <a href="{{ route('register') }}">Daftar</a></div>
</form>
@endsection
