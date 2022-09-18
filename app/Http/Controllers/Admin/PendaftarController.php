<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;
use Session;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $q_status = $request->q_status;
        
        $pendaftar = Pendaftar::orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $pendaftar->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        if (!empty($q_status)) {
            $pendaftar->where('status', $q_status);
        }

        $pendaftar = $pendaftar->paginate();
        $skipped = ($pendaftar->perPage() * $pendaftar->currentPage()) - $pendaftar->perPage();

        return view('apps.admin.pendaftar.index')->with('pendaftar', $pendaftar)
                                               ->with('skipped', $skipped)
                                               ->with('q_nama', $q_nama)
                                               ->with('q_status', $q_status);
                                          
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftar $pendaftar)
    {
        return view('apps.admin.pendaftar.show')->with('pendaftar', $pendaftar);
    }

    public function update(Request $request){
        $pendaftar = Pendaftar::findOrFail($pendaftar->id);
        $pendaftar->update(['status' => $request->status]);

        Session::flash('flash_message', 'Data telah disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $pendaftar = Pendaftar::findOrFail($request->id);
        
        $pendaftar->delete();
        return redirect()->back();
    }

    public function sertifikatKompetensi(Pendaftar $pendaftar){
        return response()->download(storage_path('app/'. $pendaftar->sertifikat_kompetensi));
    }

    public function sertifikatPendukung(Pendaftar $pendaftar){
        return response()->download(storage_path('app/'. $pendaftar->sertifikat_pendukung));
    }

    public function sertifikatBidang(Pendaftar $pendaftar){
        return response()->download(storage_path('app/'. $pendaftar->sertifikat_bidang));
    }

    public function tandaTangan(Pendaftar $pendaftar){
        return response()->download(storage_path('app/'. $pendaftar->tanda_tangan));
    }
}
