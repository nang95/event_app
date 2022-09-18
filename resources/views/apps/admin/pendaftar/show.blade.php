@extends('layouts.dashboard')

@section('title')
    Pendaftar
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-sm-8">
        <div class="widget">
            <div class="widget-header bordered-top bordered-palegreen">
                <span class="widget-caption">Detail Data</span>
            </div>
            
            <div class="widget-body">
                <div class="collapse in">
                    <div class="form-group">
                        <label for="nama">Nama: </label>
                        <div style="font-size: 16px">{{ $pendaftar->nama }}</div>
                    </div>

                    <div class="form-group">
                        <label for="nip">NIP: </label>
                        <div style="font-size: 16px">{{ $pendaftar->nip }}</div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email: </label>
                        <div style="font-size: 16px">{{ $pendaftar->email }}</div>
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan: </label>
                        <div style="font-size: 16px">{{ $pendaftar->jabatan->nama }}</div>
                    </div>

                    <div class="form-group">
                        <label for="golongan">Golongan: </label>
                        <div style="font-size: 16px">{{ $pendaftar->golongan->nama }}</div>
                    </div>

                    <div class="form-group">
                        <label for="bidang_keahlian">Bidang Keahlian: </label>
                        <div style="font-size: 16px">{{ $pendaftar->bidangKeahlian->nama }}</div>
                    </div>

                    <div class="form-group">
                        <label for="unit_kerja">Unit Kerja: </label>
                        <div style="font-size: 16px">{{ $pendaftar->unit_kerja }}</div>
                    </div>

                    <div class="form-group">
                        <label for="pendidikan_terakhir">Pendidikan Terakhir: </label>
                        <div style="font-size: 16px">{{ $pendaftar->pendidikan_terakhir }}</div>
                    </div>

                    <div class="form-group">
                        <label for="kemampuan_peran">Kemampuan Peran: </label>
                        <div style="font-size: 16px">{{ $pendaftar->kemampuan_peran }}</div>
                    </div>

                    <div class="form-group">
                        <label for="kemampuan_peran">Kemampuan Membuat Slide, Handout, Soal & Jawaban: </label>
                        <div style="font-size: 16px">{{ $pendaftar->kemampuan_slide }}</div>
                    </div>

                    <div class="form-group">
                        <label for="kemampuan_peran">Sertifikat Bidang</label>
                        <div style="font-size: 16px">
                            <a href="{{ route('admin.pendaftar.sertifikat_bidang', $pendaftar->id) }}">
                                <button class="btn btn-sm btn-info">Download</button>
                            </a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kemampuan_peran">Sertifikat Kompetensi</label>
                        <div style="font-size: 16px">
                            <a href="{{ route('admin.pendaftar.sertifikat_kompetensi', $pendaftar->id) }}">
                                <button class="btn btn-sm btn-info">Download</button>
                            </a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kemampuan_peran">Sertifikat Pendukung</label>
                        <div style="font-size: 16px">
                            <a href="{{ route('admin.pendaftar.sertifikat_pendukung', $pendaftar->id) }}">
                                <button class="btn btn-sm btn-info">Download</button>
                            </a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kemampuan_peran">Tanda Tangan</label>
                        <div style="font-size: 16px">
                            <a href="{{ route('admin.pendaftar.tanda_tangan', $pendaftar->id) }}">
                                <button class="btn btn-sm btn-info">Download</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-4">
        <div class="widget">
            <div class="widget-header bordered-top bordered-palegreen">
                <span class="widget-caption">Status Penerimaan</span>
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
                    <div class="form-group">
                        <form action="{{ route('admin.pendaftar.update') }}" method="POST">
                            @csrf @method('PUT')
                            <input type="hidden" name="{{ $pendaftar->id }}">
                            <label for="">Status</label>
                            <select class="form-control input-sm" id="nama">
                                <option value="">-Silahkan Pilih-</option>
                                <option value="0">Proses</option>
                                <option value="1">Ditolak</option>
                                <option value="2">Diterima</option>
                            </select>
                        </form>
                    </div>                   

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('admin.pendaftar') }}">
                                    <button class="btn btn-danger btn-sm" type="button">Kembali</button>
                                </a>  
                            </div>
                            <div class="col-md-6" style="text-align:right">
                                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection