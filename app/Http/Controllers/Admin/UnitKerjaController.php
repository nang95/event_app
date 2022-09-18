<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnitKerja;
use Session;

class UnitKerjaController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $unit_kerja = UnitKerja::orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $unit_kerja->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $unit_kerja = $unit_kerja->paginate();
        $skipped = ($unit_kerja->perPage() * $unit_kerja->currentPage()) - $unit_kerja->perPage();

        return view('apps.admin.unit_kerja.index')->with('unit_kerja', $unit_kerja)
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
        return view('apps.admin.unit_kerja.create');
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
        UnitKerja::create($data);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.unit_kerja');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitKerja $unit_kerja)
    {
        return view('apps.admin.unit_kerja.edit')->with('unit_kerja', $unit_kerja);
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
        $unit_kerja = UnitKerja::findOrFail($request->id);
        $data = $request->all();

        $unit_kerja->update($data);
        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.unit_kerja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $unit_kerja = UnitKerja::findOrFail($request->id);
        
        $unit_kerja->delete();
        return redirect()->back();
    }
}
