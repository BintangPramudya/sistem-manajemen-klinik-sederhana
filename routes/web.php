<?php

use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DahsboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    });
    Route::get('/pasien', function () {
        return view('pasiens.index');
    });
    Route::get('/tambahdata', function () {
        return view('pasiens.insert');
    });
    Route::get('/update', function () {
        return view('pasiens.update');
    });
    Route::get('/show', function () {
        return view('pasiens.show');
    });


    // obat
    Route::get('/tambah-data-obat', function () {
        return view('obats.insert');
    });



    // ================================================================================================


    //pasien
    Route::resource('/pasien', PasienController::class);

    //dashboard

    Route::resource('/dashboard', DashboardController::class);

    // obat
    Route::resource('/obat', ObatController::class);

    // laboratorium
    Route::resource('/lab', LabController::class);

    // laboratorium
    Route::resource('/dokter', DokterController::class);


    // rekam medis
    Route::resource('/rekam-medis', RekamMedisController::class);

    Route::resource('profil', UserController::class);
    Route::resource('user', UserController::class);
});















