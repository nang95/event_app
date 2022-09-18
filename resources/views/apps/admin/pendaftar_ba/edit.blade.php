@extends('layouts.dashboard')

@section('title')
    Berita Acara
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
                    <form role="form" action="{{ route('admin.pendaftar_ba.update') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('PUT') }}

                        <input type="hidden" name="id" value="{{ $pendaftar_ba->id }}">
                        <input type="hidden" name="pendaftar_id" value="{{ $pendaftar_ba->pendaftar_id }}">
                        
                        <div class="form-group">
                            <label for="file_ba">File Berita Acara</label>
                            <input type="file" name="file_ba" class="form-control input-sm" id="file_ba">
                        </div>                        

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                </div>
                                <div class="col-md-6" style="text-align:right">
                                    <a href="{{ route('admin.pendaftar_ba') }}">
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