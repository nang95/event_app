@extends('layouts.dashboard')

@section('title')
    Bidang Keahlian
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-sm-8">
        <div class="widget">
            <div class="widget-header bordered-top bordered-palegreen">
                <span class="widget-caption">Edit Data</span>
            </div>
            
            <div class="widget-body">
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            <ul>
                                <li>{{ $error }}</li>
                            </ul>
                        @endforeach
                    </div>
                @endif
                <div class="collapse in">
                    <form role="form" action="{{ route('admin.bidang_keahlian.update') }}" method="POST">
                        {{ csrf_field() }} {{ method_field('PUT') }}

                        <input type="hidden" name="id" value="{{ $bidang_keahlian->id }}">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" value="{{ old('type', $bidang_keahlian->nama) }}" class="form-control input-sm" id="nama">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                </div>
                                <div class="col-md-6" style="text-align:right">
                                    <a href="{{ route('admin.bidang_keahlian') }}">
                                        <button class="btn btn-danger btn-sm" type="button">Batal</button>
                                    </a>  
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection