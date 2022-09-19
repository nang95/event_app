<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Session;

class AnggotaController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $anggota = Pendaftar::where('is_setuju', 1)->orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $anggota->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $anggota = $anggota->paginate();
        $skipped = ($anggota->perPage() * $anggota->currentPage()) - $anggota->perPage();

        return view('apps.admin.anggota.index')->with('anggota', $anggota)
                                               ->with('skipped', $skipped)
                                               ->with('q_nama', $q_nama);
                                          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftar $anggota)
    {
        return view('apps.admin.anggota.show')->with('anggota', $anggota);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $anggota = Pendaftar::findOrFail($request->id);
        
        $anggota->delete();
        return redirect()->back();
    }
}
