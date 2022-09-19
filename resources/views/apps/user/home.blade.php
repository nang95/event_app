@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="row">
    @if ($pendaftar->status == 1)
    <div class="col-lg-12 col-sm-12">
        <div class="widget">
            <div class="widget-body">
                <div class="text-center">
                    <div style="font-size: 24px">Data Anda di terima, Silahkan Lanjutkan formulir ini</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-4">
        <div class="widget">
            <div class="widget-body">
                <button class="btn btn-info">Download</button>
                <p></p>
                <div style="font-weight: bold">Download File BA</div>
                <p></p>
                <p></p>
                <form role="form" action="{{ route('admin.jabatan.insert') }}" method="POST">
                    {{ csrf_field() }} {{ method_field('POST') }}

                    <div class="form-group">
                        <label for="nama">Dari data diatas, apakah anda menyetujui?</label>
                        <select name="nama" value="{{ old('nama') }}"  class="form-control input-sm">
                            <option value="">-Silahan Pilih-</option>
                            <option value="">Ya</option>
                            <option value="">Tidak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                            </div>
                            <div class="col-md-6" style="text-align:right">
                                <a href="{{ route('admin.jabatan') }}">
                                    <button class="btn btn-danger btn-sm" type="button">Batal</button>
                                </a>  
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-12 col-sm-12">
        <div class="widget">
            <div class="widget-body">
                <div class="text-center">
                    <div style="font-size: 24px">Mohon maaf data Anda di tolak</div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
