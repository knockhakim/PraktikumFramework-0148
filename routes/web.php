<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
Route::get('/mahasiswa/add', [MahasiswaController::class, 'create'])->name('mahasiswaAdd');
Route::post('/mahasiswa/add', [MahasiswaController::class, 'store'])->name('mahasiswaAddSave');
Route::get('/mahasiswa/edit/{nim}', [MahasiswaController::class, 'getEdit'])->name('mahasiswaEdit');
Route::post('/mahasiswa/edit/{nim}', [MahasiswaController::class, 'postEdit'])->name('mahasiswaEditSave');
Route::post('/mahasiswa/delete/{nim}', [MahasiswaController::class, 'delete'])->name('mahasiswaDelete');