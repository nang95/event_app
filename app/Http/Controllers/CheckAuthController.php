<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;

class CheckAuthController extends Controller
{
    public function checkUserLevel(){
        switch (auth()->user()->user_level) {
            case 'Admin':
                return redirect()->to('/admin');
                break;
            case 'Pendaftar':
                return redirect()->to('/user');
                break;
            default:
                return Auth::logout();
                break;
        }
    }
}
