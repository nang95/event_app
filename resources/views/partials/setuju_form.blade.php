<div class="col-xs-12 col-md-6 col-md-offset-3" style="margin-top: 20px">
    <div class="widget">
        <div class="widget-body">
            <div style="font-weight: bold">Download File BA</div>
            <p></p>
            <a href="{{ route('user.file_ba', $pendaftar->id) }}">
                <button class="btn btn-info">Download</button>
            </a>
            <p></p>
            <p></p>
            <form role="form" action="{{ route('user.submit_ba') }}" method="POST">
                {{ csrf_field() }} {{ method_field('POST') }}
                
                <input type="hidden" name="id" value="{{ $pendaftar->id }}">

                <div class="form-group">
                    <label for="is_setuju">Dari data diatas, apakah anda menyetujui?</label>
                    <select name="is_setuju" value="{{ old('is_setuju') }}"  class="form-control input-sm">
                        <option value="">-Silahan Pilih-</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
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