<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{PendaftarBa, Pendaftar};
use Session;

class PendaftarBaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $pendaftar_ba = PendaftarBa::WhereIn('pendaftar_id', function($query){
            $query->select('id')->from('pendaftars')->where('is_setuju', 1);
        });

        if (!empty($q_nama)) {
            $pendaftar_ba->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $pendaftar_ba = $pendaftar_ba->paginate();
        $skipped = ($pendaftar_ba->perPage() * $pendaftar_ba->currentPage()) - $pendaftar_ba->perPage();

        return view('apps.admin.pendaftar_ba.index')->with('pendaftar_ba', $pendaftar_ba)
                                               ->with('skipped', $skipped)
                                               ->with('q_nama', $q_nama);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PendaftarBa $pendaftar_ba)
    {
        return view('apps.admin.pendaftar_ba.edit')->with('pendaftar_ba', $pendaftar_ba);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ba_pendaftar = PendaftarBa::findOrFail($request->id);
        $data = $request->all();

        if($request->file('file_ba')){
            $file= $request->file('file_ba');
            $filename= $file->getClientOriginalName();
            $file_ba = $request->file('file_ba')->store('file_ba');
            $data['file_ba']= $file_ba;
        }

        $ba_pendaftar->update($data);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.pendaftar_ba');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $ba_pendaftar = PendaftarBa::findOrFail($request->id);

        $ba_pendaftar->delete();
    }

    public function generate(){
        $pendaftar = Pendaftar::whereNotIn('id', function($query){
            $query->select('pendaftar_id')->from('pendaftar_bas');
        })->get();

        foreach ($pendaftar as $item) {
            PendaftarBa::create([
                'pendaftar_id' => $item->id,
                'file_ba' => null
            ]);
        }

        return redirect()->back();
    }

    public function fileBa(PendaftarBa $pendaftar_ba){
        return response()->download(storage_path('app/'. $pendaftar_ba->file_ba));
    }
}
