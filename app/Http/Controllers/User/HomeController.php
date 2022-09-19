<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Pendaftar};
use session;

class HomeController extends Controller
{
    public function index(){
        $pendaftar = Pendaftar::where('email', auth()->user()->email)->first();

        return view('apps.user.home')->with('pendaftar', $pendaftar);
    }
}
