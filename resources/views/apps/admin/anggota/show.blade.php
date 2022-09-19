@extends('layouts.dashboard')

@section('title')
    Anggota
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
                        <div style="font-size: 16px">{{ $anggota->nama }}</div>
                    </div>

                    <div class="form-group">
                        <label for="nip">NIP: </label>
                        <div style="font-size: 16px">{{ $anggota->nip }}</div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email: </label>
                        <div style="font-size: 16px">{{ $anggota->email }}</div>
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan: </label>
                        <div style="font-size: 16px">{{ $anggota->jabatan->nama }}</div>
                    </div>

                    <div class="form-group">
                        <label for="golongan">Golongan: </label>
                        <div style="font-size: 16px">{{ $anggota->golongan->nama }}</div>
                    </div>

                    <div class="form-group">
                        <label for="bidang_keahlian">Bidang Keahlian: </label>
                        <div style="font-size: 16px">{{ $anggota->bidangKeahlian->nama }}</div>
                    </div>

                    <div class="form-group">
                        <label for="unit_kerja">Unit Kerja: </label>
                        <div style="font-size: 16px">{{ $anggota->unit_kerja }}</div>
                    </div>

                    <div class="form-group">
                        <label for="pendidikan_terakhir">Pendidikan Terakhir: </label>
                        <div style="font-size: 16px">{{ $anggota->pendidikan_terakhir }}</div>
                    </div>

                    <div class="form-group">
                        <label for="kemampuan_peran">Kemampuan Peran: </label>
                        <div style="font-size: 16px">{{ $anggota->kemampuan_peran }}</div>
                    </div>

                    <div class="form-group">
                        <label for="kemampuan_peran">Kemampuan Membuat Slide, Handout, Soal & Jawaban: </label>
                        <div style="font-size: 16px">{{ $anggota->kemampuan_slide }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection