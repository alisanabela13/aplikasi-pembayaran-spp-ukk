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

Route::redirect('/', '/home');
Auth::routes();

Route::group(['middleware' => 'auth'], function() {
  Route::get('/home', 'HomeController@index')->name('home');

  //profil
  Route::get('profil', 'ProfilController@index')->name('profil');
  Route::put('/profil/password', 'ProfilController@changePassword')->name('profil.changePassword');
  Route::put('/profil/update', 'ProfilController@update')->name('profil.update');

  Route::group(['middleware' => 'role:Admin'], function(){
    //petugas
    Route::get('petugas', 'PetugasController@index')->name('petugas');
    Route::get('petugas/create', 'PetugasController@create')->name('petugas.create');
    Route::post('petugas/store', 'PetugasController@store')->name('petugas.store');
    Route::get('petugas/{id}', 'PetugasController@edit')->name('petugas.edit');
    Route::put('petugas/{id}/update', 'PetugasController@update')->name('petugas.update');
    Route::delete('petugas/{id}', 'PetugasController@destroy')->name('petugas.destroy');

    //siswa
    Route::get('siswa', 'SiswaController@index')->name('siswa');
    Route::get('siswa/create', 'SiswaController@create')->name('siswa.create');
    Route::post('siswa/store', 'SiswaController@store')->name('siswa.store');
    Route::get('siswa/{id}', 'SiswaController@edit')->name('siswa.edit');
    Route::put('siswa/{id}/update', 'SiswaController@update')->name('siswa.update');
    Route::delete('siswa/{id}', 'SiswaController@destroy')->name('siswa.destroy');

    //spp
    Route::get('spp', 'SppController@index')->name('spp');
    Route::put('spp/{id}/update', 'SppController@update')->name('spp.update');

    //petunjuk
    Route::get('petunjuk', 'PetunjukController@index')->name('petunjuk');
    Route::put('petunjuk.update', 'PetunjukController@update')->name('petunjuk.update');

    //tapel
    Route::get('tapel', 'TapelController@index')->name('tapel');
    Route::post('tapel/store', 'TapelController@store')->name('tapel.store');
    Route::put('tapel/{id}/update', 'TapelController@update')->name('tapel.update');
    Route::delete('tapel/{id}', 'TapelController@destroy')->name('tapel.destroy');

    //jenjang
    Route::get('jenjang', 'JenjangController@index')->name('jenjang');

    //prodi
    Route::get('prodi', 'ProdiController@index')->name('prodi');
    Route::post('prodi/store', 'ProdiController@store')->name('prodi.store');
    Route::put('prodi/{id}/update', 'ProdiController@update')->name('prodi.update');
    Route::delete('prodi/{id}', 'ProdiController@destroy')->name('prodi.destroy');

    //kelas
    Route::get('kelas', 'KelasController@index')->name('kelas');
    Route::post('kelas/store', 'KelasController@store')->name('kelas.store');
    Route::put('kelas/{id}/update', 'KelasController@update')->name('kelas.update');
    Route::delete('kelas/{id}', 'KelasController@destroy')->name('kelas.destroy');

    //laporan
    Route::get('laporan', 'PembayaranController@laporan')->name('laporan');
    Route::get('/laporan/cetak/filter/{spp}/{tapel}/{kelas}', 'PembayaranController@cetakFilter')->name('cetak.laporan.filter');
    Route::get('laporan/cetak', 'PembayaranController@cetakSemua')->name('cetak.laporan.semua');

  });

  Route::group(['middleware' => 'role:Siswa'], function(){
    
    //bayar spp
    Route::get('bayar', 'PembayaranController@create')->name('bayar.create');
    Route::get('historypembayaran', 'PembayaranController@historySiswa')->name('history.siswa');
    Route::post('bayar/store', 'PembayaranController@bayarSiswa')->name('siswa.bayar');
  });

  Route::group(['middleware' => 'role:Admin,Petugas'], function(){

    //data pembayaran
    Route::get('bayarlunas', 'PembayaranController@bayarLunas')->name('lunas');
    Route::get('bayartolak', 'PembayaranController@bayarTolak')->name('tolak');
    Route::get('belumverif', 'PembayaranController@belumTerverifikasi')->name('belumverif');
    Route::get('belumverif/{id}', 'PembayaranController@tindak')->name('tindak');
    Route::put('belumverif/lunas/{id}/update', 'PembayaranController@Lunas')->name('verif.lunas');
    Route::put('belumverif/tolak/{id}/update', 'PembayaranController@Tolak')->name('verif.tolak');
  });
});

