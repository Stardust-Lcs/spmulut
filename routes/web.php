<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardPenyakitController;
use App\Http\Controllers\DashboardGejalaController;
use App\Http\Controllers\DashboardBasisController;
use App\Http\Controllers\DashboardPertanyaanController;
use App\Http\Controllers\FormPertanyaanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenyakitController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


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

Route::get('/home',function () {
    return view('home', [
        "title" => "Home"
    ]);
});

// Route::get('home/', HomeController::class);

Route::get('/about',function () {
    return view('about',[
        "title" => "Tentang",
        "name" => "Geri Satria",
        "email" => "gerry.satria20@gmail.com"
    ]);
});



// Route::get('/', 'Auth\FormPertanyaanController');
Route::resource('/form', FormPertanyaanController::class);
Route::resource('/penyakit', PenyakitController::class);
// Route::get('/hasilakhir/{persentase}','App\Http\Controllers\FormPertanyaanController@show');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);





// Route::resources([
    //     '/dashboard/penyakit'=> DashboardPenyakitController::class
    // ]);
    
// Route::get('/dashboard',function () {
//     return view('dashboard.index');
// })->middleware('auth');
// Route::resource('dashboard/', DashboardController::class)->middleware('auth');
Route::resource('dashboard/penyakit', DashboardPenyakitController::class)->middleware('auth');
Route::resource('dashboard/gejala', DashboardGejalaController::class)->middleware('auth');
Route::resource('dashboard/basis', DashboardBasisController::class)->middleware('auth');
Route::resource('dashboard/pertanyaan', DashboardPertanyaanController::class)->middleware('auth');
// Route::resource('dashboard/riwayat', DashboardRiwayatController::class)->middleware('auth');


Route::get('/navbar',function () {
    return view('partials.navbar');
});
