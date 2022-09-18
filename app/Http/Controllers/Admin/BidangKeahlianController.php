<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BidangKeahlian;
use Session;

class BidangKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $bidang_keahlian = BidangKeahlian::orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $bidang_keahlian->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $bidang_keahlian = $bidang_keahlian->paginate();
        $skipped = ($bidang_keahlian->perPage() * $bidang_keahlian->currentPage()) - $bidang_keahlian->perPage();

        return view('apps.admin.bidang_keahlian.index')->with('bidang_keahlian', $bidang_keahlian)
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
        return view('apps.admin.bidang_keahlian.create');
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
        BidangKeahlian::create($data);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.bidang_keahlian');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BidangKeahlian $bidang_keahlian)
    {
        return view('apps.admin.bidang_keahlian.edit')->with('bidang_keahlian', $bidang_keahlian);
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
        $bidang_keahlian = BidangKeahlian::findOrFail($request->id);
        $data = $request->all();

        $bidang_keahlian->update($data);
        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.bidang_keahlian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $bidang_keahlian = BidangKeahlian::findOrFail($request->id);
        
        $bidang_keahlian->delete();
        return redirect()->back();
    }
}
