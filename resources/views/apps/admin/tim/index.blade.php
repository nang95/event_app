@extends('layouts.dashboard')

@section('title')
    Tim
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
                    Data Tim
                </div>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-6">
                        <a href="{{ route('admin.tim.create') }}" class="btn btn-success btn-sm">
                            Tambah
                        </a>
                    </div>
                    <div class="col-md-6" style="display:flex; justify-content: flex-end">
                        <form action="{{ route('admin.tim') }}" style="display: flex" method="GET">
                            <div class="input-group-sm" style="margin-left: 10px">
                                <input type="text" class="form-control" placeholder="nama..." name="q_nama" value="{{ $q_nama }}">
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
                            <th>Nama Tim</th>
                            <th>Pembelajaran</th>
                            <th>File Final BA</th>
                            <th width="30%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if (count($tim) === 0)
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

                        @foreach ($tim as $item)
                        <tr>
                            <td>{{ $loop->iteration + $skipped }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->pembelajaran->judul }}</td>
                            <td>
                                <a href="{{ route('admin.tim.file_final_ba', $item->id) }}">
                                    <button class="btn btn-sm btn-info">Download</button>
                                </a> 
                            </td>
                            <td>
                                <a href="{{ route('admin.tim.edit', $item->id) }}">
                                    <button class="btn btn-warning btn-sm">Ubah</button>
                                </a>
                                <a href="{{ route('admin.tim.tim_pendaftar', $item->id) }}">
                                    <button class="btn btn-info btn-sm">Anggota</button>
                                </a>
                                <form onsubmit="deleteThis(event)" action="{{ route('admin.tim.delete') }}" method="POST" style="display:inline-block">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="footer">
                    {{ $tim->appends(['q_nama' => $q_nama])->links() }}
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