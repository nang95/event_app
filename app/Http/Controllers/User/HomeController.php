<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pendaftar, TimPendaftar, Tim, Pembelajaran};
use Session;

class HomeController extends Controller
{
    public function index(){
        $pendaftar = Pendaftar::where('email', auth()->user()->email)->first();

        $tim_pendaftar = TimPendaftar::where('pendaftar_id', $pendaftar->id)->first();
        $pembelajaran = null;
        $anggota_tim = [];
        if (!empty($tim_pendaftar)) {
            $tim = Tim::findOrFail($tim_pendaftar->tim_id);
            $pembelajaran = Pembelajaran::findOrFail($tim->pembelajaran_id);
            $anggota_tim = TimPendaftar::where('tim_id', $tim_pendaftar->tim_id)->get();
        }
        
        return view('apps.user.home')->with('pembelajaran', $pembelajaran)
                                     ->with('pendaftar', $pendaftar)
                                     ->with('anggota_tim', $anggota_tim);
    }

    public function submitBa(Request $request){
        $pendaftar = Pendaftar::findOrFail($request->id);

        $pendaftar->update(['is_setuju' => $request->is_setuju]);

        Session::flash('flash_message', 'Data telah disimpan');
        return redirect()->back();
    }
}
