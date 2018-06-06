<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('artikel','ArtikelController');
Route::resource('eskul','EskulController');
Route::resource('fasilitas','FasilitasController');
Route::resource('galeri','GaleriController');
Route::resource('guru','GuruController');
Route::resource('kategoriartikel','KategoriArtikelController');
Route::resource('kategorigaleri','KategoriGaleriController');
Route::resource('kurikulum','KurikulumController');
Route::resource('prestasi','PrestasiController');
Route::resource('profile','ProfileController');
Route::resource('staf','StafController');

Route::get('cek', function(){
    return view ('layouts.admin');
});