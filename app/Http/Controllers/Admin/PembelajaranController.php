<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembelajaran;
use Session;

class PembelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $pembelajaran = Pembelajaran::orderBy('judul', 'asc');

        if (!empty($q_nama)) {
            $pembelajaran->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $pembelajaran = $pembelajaran->paginate();
        $skipped = ($pembelajaran->perPage() * $pembelajaran->currentPage()) - $pembelajaran->perPage();

        return view('apps.admin.pembelajaran.index')->with('pembelajaran', $pembelajaran)
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
        return view('apps.admin.pembelajaran.create');
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
        Pembelajaran::create($data);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.pembelajaran');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelajaran $pembelajaran)
    {
        return view('apps.admin.pembelajaran.edit')->with('pembelajaran', $pembelajaran);
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
        $pembelajaran = Pembelajaran::findOrFail($request->id);
        $data = $request->all();

        $pembelajaran->update($data);
        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.pembelajaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $pembelajaran = Pembelajaran::findOrFail($request->id);
        
        $pembelajaran->delete();
        return redirect()->back();
    }
}
