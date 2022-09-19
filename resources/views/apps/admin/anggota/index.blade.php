@extends('layouts.dashboard')

@section('title')
    Anggota
@endsection

@section('content')
    @if(Session::has('flash_message'))
    <script type="text/javascript">
        Swal.fire("Berhasil!","{{ Session('flash_message') }}", "success");
    </script>
    @endif

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="well with-header with-footer">
                <div class="header bg-blue">
                    Data Anggota
                </div>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-6"></div>
                    <div class="col-md-6" style="display:flex; justify-content: flex-end">
                        <form action="{{ route('admin.anggota') }}" style="display: flex" method="GET">
                            <div class="input-group-sm">
                                <input type="text" class="form-control" placeholder="nama..." name="q_nama" value="{{ $q_nama }}">
                            </div>
                            <div class="input-group-sm" style="margin-left: 10px; display:flex; justify-content: center">
                                <button class="btn btn-primary btn-sm">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bordered-darkorange">
                            <tr>
                                <th width="5%">#</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                {{-- <th>Email</th> --}}
                                {{-- <th>Jabatan</th>
                                <th>Golongan</th> --}}
                                {{-- <th>U.Kerja</th> --}}
                                {{-- <th>Pen. Terakhir</th> --}}
                                <th>Bdg. Keahlian</th>
                                <th>Kem. Peran</th>
                                <th>Kem. Slide</th>
                                {{-- <th>Status</th> --}}
                                {{-- <th>Sert. Bidang</th>
                                <th>Sert. Kompetensi</th>
                                <th>Sert. Pendukung</th>
                                <th>TTD</th> --}}
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @if (count($anggota) === 0)
                            <tr>
                                <td colspan="8" style="text-align:center">
                                    @if ($q_nama == "")
                                        <span>Data Kosong</span>
                                    @else
                                        <span>Kriteria yang anda cari tidak sesuai</span>
                                    @endif
                                </td>
                            </tr>
                            @endif
    
                            @foreach ($anggota as $item)
                            <tr>
                                <td>{{ $loop->iteration + $skipped }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nip }}</td>
                                {{-- <td>{{ $item->email }}</td> --}}
                                {{-- <td>{{ $item->jabatan->nama }}</td>
                                <td>{{ $item->golongan->nama }}</td>
                                <td>{{ $item->unitKerja->nama }}</td> --}}
                                {{-- <td>{{ $item->pendidikan_terakhir }}</td> --}}
                                <td>{{ $item->bidangKeahlian->nama }}</td>
                                <td>{{ $item->kemampuan_peran }}</td>
                                <td>{{ $item->kemampuan_slide }}</td>
                                {{-- <td>
                                    @if ($item->status == 0)
                                        <span class="badge badge-secondary">Proses</span>
                                    @elseif ($item->status == 1)
                                        <span class="badge badge-success">Diterima</span>
                                    @elseif ($item->status == 2)
                                        <span class="badge badge-danger">Ditolak</span>
                                    @endif
                                </td> --}}
                                {{-- <td>{{ $item->sertifikat_bidang }}</td>
                                <td>{{ $item->sertifikat_kompetensi }}</td>
                                <td>{{ $item->sertifikat_pendukung }}</td>
                                <td>{{ $item->tanda_tangan }}</td> --}}
                                <td>
                                    <a href="{{ route('admin.anggota.show', $item->id) }}">
                                        <button class="btn btn-info btn-sm">Lihat</button>
                                    </a>
                                    <form onsubmit="deleteThis(event)" action="{{ route('admin.anggota.delete') }}" method="POST" style="display:inline-block">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="footer">
                    {{ $anggota->appends(['q_nama' => $q_nama])->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection

@section('footer-scripts')
<script type="text/javascript">
    function deleteThis(e){
        e.preventDefault();
        Swal.fire({
        title: "<div style='font-size:20px'>Apakah anda yakin?</div>",
        html: "<div style='font-size:15px'>Data akan dihapus secara permanen!</div>",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
        })
        .then((res) => {
            if (res.isConfirmed) {
                e.target.submit();
                swal("Data telah dihapus!", {
                icon: "success",
                });
            }
        });

        return false;
    }
</script>
@endsection