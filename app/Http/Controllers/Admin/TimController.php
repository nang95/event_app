<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Tim, Pembelajaran};
use Session;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q_nama = $request->q_nama;
        $tim = Tim::orderBy('nama', 'asc');

        if (!empty($q_nama)) {
            $tim->where('nama', 'LIKE', '%'.$q_nama.'%');
        }

        $tim = $tim->paginate();
        $skipped = ($tim->perPage() * $tim->currentPage()) - $tim->perPage();

        return view('apps.admin.tim.index')->with('tim', $tim)
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
        $pembelajaran = Pembelajaran::get();
        return view('apps.admin.tim.create')->with('pembelajaran', $pembelajaran);
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

        if($request->file('file_final_ba')){
            $file= $request->file('file_final_ba');
            $filename= $file->getClientOriginalName();
            $file_final_ba = $request->file('file_final_ba')->store('file_final_ba');
            $data['file_final_ba']= $file_final_ba;
        }

        Tim::create($data);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.tim');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tim $tim)
    {
        $pembelajaran = Pembelajaran::get();
        return view('apps.admin.tim.edit')->with('pembelajaran', $pembelajaran)
                                          ->with('tim', $tim);
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
        $tim = Tim::findOrFail($request->id);
        $data = $request->all();

        $data['file_final_ba'] = $tim->file_final_ba;

        if($request->file('file_final_ba')){
            $file= $request->file('file_final_ba');
            $filename= $file->getClientOriginalName();
            $file_final_ba = $request->file('file_final_ba')->store('file_final_ba');
            $data['file_final_ba']= $file_final_ba;
        }
        
        $tim->update($data);
        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->route('admin.tim');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $tim = Tim::findOrFail($request->id);
        
        $tim->delete();
        return redirect()->back();
    }

    public function fileFinalBa(Tim $tim){
        return response()->download(storage_path('app/'. $tim->file_final_ba));
    }
}
