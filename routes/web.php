<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inkubasi;
use App\Http\Controllers\Home;
use App\Http\Controllers\User;
use App\Models\Examination;
use App\Models\Mahasiswa;
use App\Models\Practice;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [Home::class, 'home'])->name('home');

Route::get('/guest',[Home::class,'home'])->name('login');

Route::post('/home',[Home::class, 'login']);

Route::post('/guest', [Home::class,'login']);

Route::get('/report/{id}',[User::class, 'report']);

Route::post('/submit/{id}',[Inkubasi::class, 'submit']);

Route::get('/inkubasi', [Inkubasi::class,'index']);

Route::get('/user', [User::class,'index'])->name('user');

Route::get('/latihan/{type}',[Inkubasi::class,'mulaiLatihan'])
    ->where('type','[A-Za-z]+');

Route::get('/latihan/{type}/{kategori}/{id}',[Inkubasi::class,'latihanSoal'])
    ->where('type','[A-Za-z]+')
    ->where('kategori','[A-Za-z]+');

Route::post('/latihan/{type}/{kategori}/{id}',[Inkubasi::class,'jawab']);

Route::get('/{kategori}/{materi}/{target}',[Inkubasi::class,'materi']);

Route::get('/jawara', function () {
    return view('jawara');
});

Route::get('/exchange', [StudentExchange::class, 'index']);

Route::get('/daftar-exchange/{id}',[StudentExchange::class, 'daftar']);

Route::post('/daftar-exchange',[StudentExchange::class,'daftar']);

Route::get('/persyaratan-exchange/{id}',[StudentExchange::class, 'persyaratan']);

Route::get('/training', function () {
    return view('training');
});
Route::get('/details', function () {
    return view('details');
});
Route::get('/detailspe/{id}', [PassController::class,'passpe']);

Route::get('/detailspm/{id}', [PassController::class,'passpm']);
Route::get('/detailsem/{id}', [PassController::class,'passem']);

Route::get('/daftarjc/{id}', [PassController::class,'passdaftarjc']);
Route::get('/detailset/{id}', [PassController::class,'passet']);

Route::get('/detailspojt/{id}', [PassController::class,'passpojt']);

Route::get('/detailsojtt/{id}', [PassController::class,'passpojt']);
Route::get('/detailsojtm/{id}', [PassController::class,'passojtm']);

Route::get('/daftarojt/{id}', [PassController::class,'passdaftarojt']);











Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::fallback(function(){
    return redirect('home');
});
