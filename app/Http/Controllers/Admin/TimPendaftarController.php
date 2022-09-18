<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{TimPendaftar, Tim, Pendaftar};
use Session;

class TimPendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Tim $tim)
    {
        $q_nama_pendaftar = $request->q_nama_pendaftar;
        $q_nama_tim = $request->q_nama_tim;

        $pendaftar = Pendaftar::whereNotIn('id', function($query){
            $query->select('pendaftar_id')->from('tim_pendaftars');
        });

        $tim_pendaftar = TimPendaftar::where('tim_id', $tim->id);

        if (!empty($q_nama_pendaftar)) {
            $pendaftar->where('nama', 'LIKE', '%'.$q_nama_pendaftar.'%');
        }

        if (!empty($q_nama_tim)) {
            $tim->where('nama', 'LIKE', '%'.$q_nama_tim.'%');
        }

        $tim_pendaftar = $tim_pendaftar->paginate();
        $skipped_tim = ($tim_pendaftar->perPage() * $tim_pendaftar->currentPage()) - $tim_pendaftar->perPage();

        $pendaftar = $pendaftar->paginate();
        $skipped_pendaftar = ($pendaftar->perPage() * $pendaftar->currentPage()) - $pendaftar->perPage();

        return view('apps.admin.tim_pendaftar.index')->with('tim', $tim)
                                           ->with('tim_pendaftar', $tim_pendaftar)
                                           ->with('pendaftar', $pendaftar)
                                           ->with('skipped_tim', $skipped_tim)
                                           ->with('skipped_pendaftar', $skipped_pendaftar)
                                           ->with('q_nama_pendaftar', $q_nama_pendaftar)
                                           ->with('q_nama_tim', $q_nama_tim);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        TimPendaftar::create($data);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $tim_pendaftar = TimPendaftar::findOrFail($request->id);

        $tim_pendaftar->delete();
        return redirect()->back();
    }
}
