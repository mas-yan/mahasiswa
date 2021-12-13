<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\MahasiswaController;

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
    return view('index');
});

Route::get('mahasiswa',[MahasiswaController::class,'index']);
Route::post('mahasiswa',[MahasiswaController::class,'add']);
Route::put('mahasiswa',[MahasiswaController::class,'edit']);
Route::get('mahasiswa/{id}',[MahasiswaController::class,'hapus']);

Route::get('dosen', function () {
    return view('dosen');
});
