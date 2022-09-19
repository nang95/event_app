<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Pendaftar, Jabatan, Golongan, UnitKerja, BidangKeahlian};
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        $jabatan = Jabatan::orderBy('nama', 'asc')->get();
        $golongan = Golongan::orderBy('nama', 'asc')->get();
        $unit_kerja = UnitKerja::orderBy('nama', 'asc')->get();
        $bidang_keahlian = BidangKeahlian::orderBy('nama', 'asc')->get();

        return view('auth.register')->with('jabatan', $jabatan)
                                    ->with('golongan', $golongan)
                                    ->with('unit_kerja', $unit_kerja)
                                    ->with('bidang_keahlian', $bidang_keahlian);
    }

    public function insert(Request $request){
        $data = $request->all();
        
        if($request->file('sertifikat_bidang')){
            $file= $request->file('sertifikat_bidang');
            $filename= $file->getClientOriginalName();
            $sertifikat_bidang = $request->file('sertifikat_bidang')->store('sertifikat_bidang');
            $data['sertifikat_bidang']= $sertifikat_bidang;
        }

        if($request->file('sertifikat_kompetensi')){
            $file= $request->file('sertifikat_kompetensi');
            $filename= $file->getClientOriginalName();
            $sertifikat_kompetensi = $request->file('sertifikat_kompetensi')->store('sertifikat_kompetensi');
            $data['sertifikat_kompetensi']= $sertifikat_kompetensi;
        }

        if($request->file('sertifikat_pendukung')){
            $file= $request->file('sertifikat_pendukung');
            $filename= $file->getClientOriginalName();
            $sertifikat_pendukung = $request->file('sertifikat_pendukung')->store('sertifikat_pendukung');
            $data['sertifikat_pendukung']= $sertifikat_pendukung;
        }

        if($request->file('tanda_tangan')){
            $file= $request->file('tanda_tangan');
            $filename= $file->getClientOriginalName();
            $tanda_tangan = $request->file('tanda_tangan')->store('tanda_tangan');
            $data['tanda_tangan']= $tanda_tangan;
        }

        $data['status'] = 0;

        $image = explode(";base64,", $request->tanda_tangan);
        $image_type = explode("image/", $image[0]);    
        $image_base64 = base64_decode($image[1]);
        Storage::put('tanda_tangan/'.$request->nip.'.jpg', $image_base64);

        $data['tanda_tangan'] = 'tanda_tangan/'.$request->nip.'.jpg';
        $pendaftar = Pendaftar::create($data); 
        
        User::create([
            'name' => $request->nama,
            'username' => $request->nip,
            'password' => Hash::make($request->nip),
            'email' => $request->nip.'@gmail.com',
            'user_level' => 'Pendaftar',
        ]);
        return redirect()->back();
    }
}
