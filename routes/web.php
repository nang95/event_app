<?php

use Illuminate\Support\Facades\Route;

Route::namespace('auth')->group(function(){
    Route::get('login', 'LoginController@index')->name('login');
    Route::post('login', 'LoginController@insert')->name('login.insert');
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'RegisterController@index')->name('register');
    Route::post('register', 'RegisterController@insert')->name('register.insert');
});


Route::middleware('auth')->group(function(){
    Route::get('/', 'CheckAuthController@checkUserLevel');

    Route::prefix('/user')->namespace('User')->name('user.')->group(function(){
        Route::get('/', 'HomeController@index')->name('/');
    });

    Route::prefix('/admin')->namespace('Admin')->name('admin.')->group(function(){
        Route::get('/', 'HomeController@index')->name('/');
    
        Route::get('jabatan', 'jabatanController@index')->name('jabatan');
        Route::get('jabatan/create', 'jabatanController@create')->name('jabatan.create');
        Route::post('jabatan', 'jabatanController@insert')->name('jabatan.insert');
        Route::get('jabatan/edit/{jabatan}', 'jabatanController@edit')->name('jabatan.edit');
        Route::put('jabatan', 'jabatanController@update')->name('jabatan.update');
        Route::delete('jabatan', 'jabatanController@delete')->name('jabatan.delete');
    
        Route::get('bidang_keahlian', 'BidangKeahlianController@index')->name('bidang_keahlian');
        Route::get('bidang_keahlian/create', 'BidangKeahlianController@create')->name('bidang_keahlian.create');
        Route::post('bidang_keahlian', 'BidangKeahlianController@insert')->name('bidang_keahlian.insert');
        Route::get('bidang_keahlian/edit/{bidang_keahlian}', 'BidangKeahlianController@edit')->name('bidang_keahlian.edit');
        Route::put('bidang_keahlian', 'BidangKeahlianController@update')->name('bidang_keahlian.update');
        Route::delete('bidang_keahlian', 'BidangKeahlianController@delete')->name('bidang_keahlian.delete');
    
        Route::get('golongan', 'GolonganController@index')->name('golongan');
        Route::get('golongan/create', 'GolonganController@create')->name('golongan.create');
        Route::post('golongan', 'GolonganController@insert')->name('golongan.insert');
        Route::get('golongan/edit/{golongan}', 'GolonganController@edit')->name('golongan.edit');
        Route::put('golongan', 'GolonganController@update')->name('golongan.update');
        Route::delete('golongan', 'GolonganController@delete')->name('golongan.delete');
    
        Route::get('unit_kerja', 'UnitKerjaController@index')->name('unit_kerja');
        Route::get('unit_kerja/create', 'UnitKerjaController@create')->name('unit_kerja.create');
        Route::post('unit_kerja', 'UnitKerjaController@insert')->name('unit_kerja.insert');
        Route::get('unit_kerja/edit/{unit_kerja}', 'UnitKerjaController@edit')->name('unit_kerja.edit');
        Route::put('unit_kerja', 'UnitKerjaController@update')->name('unit_kerja.update');
        Route::delete('unit_kerja', 'UnitKerjaController@delete')->name('unit_kerja.delete');
        
        Route::get('pendaftar', 'PendaftarController@index')->name('pendaftar');
        Route::get('pendaftar/show/{pendaftar}', 'PendaftarController@show')->name('pendaftar.show');
        Route::put('pendaftar', 'PendaftarController@update')->name('pendaftar.update');

        Route::get('pendaftar/sertifikat_bidang/{pendaftar}', 'PendaftarController@sertifikatBidang')->name('pendaftar.sertifikat_bidang');
        Route::get('pendaftar/sertifikat_kompetensi/{pendaftar}', 'PendaftarController@sertifikatKompetensi')->name('pendaftar.sertifikat_kompetensi');
        Route::get('pendaftar/sertifikat_pendukung/{pendaftar}', 'PendaftarController@sertifikatPendukung')->name('pendaftar.sertifikat_pendukung');
        Route::get('pendaftar/tanda_tangan/{pendaftar}', 'PendaftarController@tandaTangan')->name('pendaftar.tanda_tangan');
        Route::get('pendaftar/terima/{pendaftar}', 'PendaftarController@terima')->name('pendaftar.terima');
        Route::delete('pendaftar', 'PendaftarController@delete')->name('pendaftar.delete');

        Route::get('pendaftar_ba', 'PendaftarBaController@index')->name('pendaftar_ba');
        Route::get('pendaftar_ba/edit/{pendaftar_ba}', 'PendaftarBaController@edit')->name('pendaftar_ba.edit');
        Route::put('pendaftar_ba', 'PendaftarBaController@update')->name('pendaftar_ba.update');
        Route::get('pendaftar_ba/generate', 'PendaftarBaController@generate')->name('pendaftar_ba.generate');
        Route::delete('pendaftar_ba', 'PendaftarBaController@delete')->name('pendaftar_ba.delete');
        Route::get('pendaftar_ba/file_ba/{pendaftar_ba}', 'PendaftarBaController@fileBa')->name('pendaftar_ba.file_ba');
    
        Route::get('pembelajaran', 'PembelajaranController@index')->name('pembelajaran');
        Route::get('pembelajaran/create', 'PembelajaranController@create')->name('pembelajaran.create');
        Route::post('pembelajaran', 'PembelajaranController@insert')->name('pembelajaran.insert');
        Route::get('pembelajaran/edit/{pembelajaran}', 'PembelajaranController@edit')->name('pembelajaran.edit');
        Route::put('pembelajaran', 'PembelajaranController@update')->name('pembelajaran.update');
        Route::delete('pembelajaran', 'PembelajaranController@delete')->name('pembelajaran.delete');
    
        Route::get('tim', 'TimController@index')->name('tim');
        Route::get('tim/create', 'TimController@create')->name('tim.create');
        Route::post('tim', 'TimController@insert')->name('tim.insert');
        Route::get('tim/edit/{tim}', 'TimController@edit')->name('tim.edit');
        Route::put('tim', 'TimController@update')->name('tim.update');
        Route::get('tim/file_final_ba/{tim}', 'TimController@fileFinalBa')->name('tim.file_final_ba');
        Route::delete('tim', 'TimController@delete')->name('tim.delete');
    
        Route::get('tim/tim_pendaftar/{tim}', 'TimPendaftarController@index')->name('tim.tim_pendaftar');
        Route::post('tim/tim_pendaftar', 'TimPendaftarController@insert')->name('tim.tim_pendaftar.insert');
        Route::put('tim/tim_pendaftar/{tim}', 'TimPendaftarController@update')->name('tim.tim_pendaftar.update');
        Route::delete('tim/tim_pendaftar', 'TimPendaftarController@delete')->name('tim.tim_pendaftar.delete');
    });
}); 

