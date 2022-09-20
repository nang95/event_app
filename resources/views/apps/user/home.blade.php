@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
@if(Session::has('flash_message'))
<script type="text/javascript">
    Swal.fire("Berhasil!","{{ Session('flash_message') }}", "success");
</script>
@endif

<div class="row">
    @if ($pendaftar->status == 1)
        @if ($pendaftar->is_setuju == 0)
            @include('partials.success_status')
            @include('partials.setuju_form')
        @else
            <div class="col-lg-6 col-md-6">
                <div class="well with-header with-footer">
                    <div class="header bg-blue">
                        Data Anggota Tim
                    </div>
                    @if ($tim_pendaftar != null)
                    <a href="{{ route('user.file_final_ba', $pendaftar->id) }}">
                        <button class="btn btn-info">Download</button>
                    </a>
                    <p></p>
                    <div style="font-weight: bold">Download File Final BA</div>
                    <p></p><p></p>
                    @endif
                    <table class="table table-hover">
                        <thead class="bordered-darkorange">
                            <tr>
                                <th width="5%">#</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Peran</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @if (count($anggota_tim) === 0)
                            <tr>
                                <td colspan="8" style="text-align:center">
                                    <span>Tim sedang diproses</span>
                                </td>
                            </tr>
                            @endif

                            @foreach ($anggota_tim as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pendaftar->nama }}</td>
                                <td>{{ $item->pendaftar->nip }}</td>
                                <td>{{ $item->pendaftar->kemampuan_peran }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @if ($pembelajaran != null)
            <div class="col-lg-6 col-md-6">
                <div class="well with-header">
                    <div class="header bg-blue">
                        Pembelajaran Tim
                    </div>
                    <div class="form-group">
                        <label for="nama">Kode Pembelajaran: </label>
                        <div style="font-size: 16px">{{ $pembelajaran->kode }}</div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Judul Pembelajaran: </label>
                        <div style="font-size: 16px">{{ $pembelajaran->judul }}</div>
                    </div>
                </div>
            </div>
            
            @endif
        @endif
    @elseif($pendaftar->status == 2)
        @include('partials.failed_status')
    @else
        @include('partials.proccess_status')
    @endif
</div>
@endsection
