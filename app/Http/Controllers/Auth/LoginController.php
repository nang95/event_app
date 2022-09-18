<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;

class LoginController extends Controller
{
    public function index(){
        if (!empty(auth()->user()->username)) {
            return redirect()->to('/');
        }

        return view('auth.login');
    }

    public function insert(Request $request){
        $rules = [
            'username'      => 'required',
            'password'      => 'required'
        ];
    
        $messages = [
            'username.required'     => 'Username wajib diisi',
            'password.required'     => 'Password wajib diisi',
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $data = [
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if(Auth::check()){
            return redirect()->to('/');
        }else{
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
