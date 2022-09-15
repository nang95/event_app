<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->prefix('/admin')->namespace('Admin')->name('admin.')->group(function(){
    Route::get('/', 'HomeController@index')->name('/');

    Route::get('carousel', 'CarouselController@index')->name('carousel');
    Route::get('carousel/create', 'CarouselController@create')->name('carousel.create');
    Route::post('carousel', 'CarouselController@store')->name('carousel.insert');
    Route::get('carousel/edit/{carousel}', 'CarouselController@edit')->name('carousel.edit');
    Route::put('carousel', 'CarouselController@update')->name('carousel.update');
    Route::delete('carousel', 'CarouselController@delete')->name('carousel.delete');
});
