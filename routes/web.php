<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::get('/home', function () {
    return view('home');
});

Route::get('/inkubasi', function () {
    return view('inkubasi');
});

Route::get('/inkubasi1', function () {
    return view('inkubasi1');
});

Route::get('/jawara', function () {
    return view('jawara');
});

Route::get('/exchange', function () {
    return view('exchange');
});

Route::get('/training', function () {
    return view('training');
});
Route::get('/details', function () {
    return view('details');
});
Route::get('/detailspe/{id}', [PassController::class,'passpe']);

Route::get('/detailspm/{id}', [PassController::class,'passpm']);
Route::get('/detailsem/{id}', [PassController::class,'passem']);

Route::get('/daftar/{id}', [PassController::class,'passdaftar']);
Route::get('/detailset/{id}', [PassController::class,'passet']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

