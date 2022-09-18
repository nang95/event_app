<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Golongan;
use Session;


class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $golongan = Golongan::orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $golongan->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $golongan = $golongan->paginate();
        $skipped = ($golongan->perPage() * $golongan->currentPage()) - $golongan->perPage();

        return view('apps.admin.golongan.index')->with('golongan', $golongan)
                                               ->with('skipped', $skipped)
                                               ->with('q_nama', $q_nama);
                                          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apps.admin.golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $data = $request->all();
        Golongan::create($data);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.golongan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Golongan $golongan)
    {
        return view('apps.admin.golongan.edit')->with('golongan', $golongan);
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
        $golongan = Golongan::findOrFail($request->id);
        $data = $request->all();

        $golongan->update($data);
        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.golongan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $golongan = Golongan::findOrFail($request->id);
        
        $golongan->delete();
        return redirect()->back();
    }
}
