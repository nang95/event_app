@extends('layouts.dashboard')

@section('title')
    Anggota Tim
@endsection

@section('content')
    @if(Session::has('flash_message'))
    <script type="text/javascript">
        Swal.fire("Berhasil!","{{ Session('flash_message') }}", "success");
    </script>
    @endif

    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="well with-header with-footer">
                <div class="header bg-blue">
                    Data Anggota pendaftar
                </div>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-6">
                        {{-- <a href="{{ route('admin.pen.create') }}" class="btn btn-success btn-sm">
                            Tambah
                        </a> --}}
                    </div>
                    <div class="col-md-6" style="display:flex; justify-content: flex-end">
                        <form action="{{ route('admin.tim.tim_pendaftar', $tim->id) }}" style="display: flex" method="GET">
                            <div class="input-group-sm" style="margin-left: 10px">
                                <input type="text" class="form-control" placeholder="nama..." name="q_nama_pendaftar" value="{{ $q_nama_pendaftar }}">
                            </div>
                            <div class="input-group-sm" style="margin-left: 10px; display:flex; justify-content: center">
                                <button class="btn btn-primary btn-sm">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead class="bordered-darkorange">
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Peran</th>
                            <th width="30%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if (count($pendaftar) === 0)
                        <tr>
                            <td colspan="8" style="text-align:center">
                                @if ($q_nama_pendaftar == "")
                                    <span>Data Kosong</span>
                                @else
                                    <span>Kriteria yang anda cari tidak sesuai</span>
                                @endif
                            </td>
                        </tr>
                        @endif

                        @foreach ($pendaftar as $item)
                        <tr>
                            <td>{{ $loop->iteration + $skipped_pendaftar }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->kemampuan_peran }}</td>
                            <td>    
                                <form action="{{ route('admin.tim.tim_pendaftar.insert') }}" method="POST" style="display:inline-block">
                                    {{ csrf_field() }} {{ method_field('POST') }}
                                    <input type="hidden" name="pendaftar_id" value="{{ $item->id }}">
                                    <input type="hidden" name="tim_id" value="{{ $tim->id }}">
                                    <button class="btn btn-success btn-sm">Masukkan</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="footer">
                    {{ $pendaftar->appends(['q_nama_pendaftar' => $q_nama_pendaftar])->links() }}
                </div>
            </div>

        </div>

        <div class="col-lg-6 col-md-6">
            <div class="well with-header with-footer">
                <div class="header bg-blue">
                    Data Anggota Tim
                </div>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-6"></div>
                    <div class="col-md-6" style="display:flex; justify-content: flex-end">
                        <form action="{{ route('admin.tim.tim_pendaftar', $tim->id) }}" style="display: flex" method="GET">
                            <div class="input-group-sm" style="margin-left: 10px">
                                <input type="text" class="form-control" placeholder="nama..." name="q_nama_tim" value="{{ $q_nama_tim }}">
                            </div>
                            <div class="input-group-sm" style="margin-left: 10px; display:flex; justify-content: center">
                                <button class="btn btn-primary btn-sm">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead class="bordered-darkorange">
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Peran</th>
                            <th width="30%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if (count($tim_pendaftar) === 0)
                        <tr>
                            <td colspan="8" style="text-align:center">
                                @if ($q_nama_tim == "")
                                    <span>Data Kosong</span>
                                @else
                                    <span>Kriteria yang anda cari tidak sesuai</span>
                                @endif
                            </td>
                        </tr>
                        @endif

                        @foreach ($tim_pendaftar as $item)
                        <tr>
                            <td>{{ $loop->iteration + $skipped_tim }}</td>
                            <td>{{ $item->pendaftar->nama }}</td>
                            <td>{{ $item->pendaftar->nip }}</td>
                            <td>{{ $item->pendaftar->kemampuan_peran }}</td>
                            <td>
                                <form action="{{ route('admin.tim.tim_pendaftar.delete') }}" method="POST" style="display:inline-block">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <input type="hidden" name="id"value="{{ $item->id }}">
                                    <button class="btn btn-danger btn-sm">Keluarkan</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="footer">
                    {{ $tim_pendaftar->appends(['q_nama_tim' => $q_nama_tim])->links() }}
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