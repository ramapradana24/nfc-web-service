<?php

use Illuminate\Http\Request;

Route::post('login/ortu', 'OrtuController@login');

Route::get('ortu/riwayat/{id_ortu}', 'OrtuController@riwayatMahasiswa');

Route::post('register', 'OrtuController@store');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource("mahasiswa", "MahasiswaController");
Route::resource("absen","KehadiranController");
