<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Admin\ExchangeEventController;
use App\Http\Controllers\Admin\ExchangePendaftarController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JawaraEventController;
use App\Http\Controllers\Admin\JawaraPendaftarController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\OJTEventController;
use App\Http\Controllers\Admin\OJTPendaftarController;
use App\Http\Controllers\Admin\PracticeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inkubasi;
use App\Http\Controllers\Home;
use App\Http\Controllers\User;
use App\Models\Examination;
use App\Models\ExchangeEvent;
use App\Models\JawaraEvent;
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


//admin

Route::name('admin.')->middleware(['auth','admin'])->prefix('admin')->group(function(){
    //homepage
    Route::get('/',[HomeController::class, 'index'])->name('home');


    //materi
    Route::get('/materi',[MateriController::class,'index'])->name('materi');

    Route::get('/materi/{materi}',[MateriController::class,'detail']);

    Route::post('/materi/{materi}',[MateriController::class,'update']);

    Route::get('/inkubasi/materi/create',[MateriController::class,'create']);

    Route::post('/inkubasi/materi/create',[MateriController::class,'push']);

    Route::get('/inkubasi/materi/{page}',[MateriController::class, 'index']);


    //practice
    Route::get('/practice',[PracticeController::class,'index'])->name('practice');

    Route::get('/practice/{practice}',[PracticeController::class,'detail']);

    Route::post('/practice/{practice}',[PracticeController::class,'update']);

    Route::get('/inkubasi/practice/create',[PracticeController::class,'create']);

    Route::post('/inkubasi/practice/create',[PracticeController::class,'push']);

    Route::get('/inkubasi/practice/{page}',[PracticeController::class,'index']);



    //jawara event
    Route::get('/jawara/event',[JawaraEventController::class,'index']);

    Route::get('/jawara/event/detail/{event}',[JawaraEventController::class,'detail']);

    Route::post('/jawara/event/detail/{event}',[JawaraEventController::class,'update']);

    Route::get('/jawara/event/create',[JawaraEventController::class,'create']);

    Route::post('/jawara/event/create',[JawaraEventController::class,'push']);

    Route::get('/jawara/event/{page}',[JawaraEventController::class,'index']);


    //jawara pendaftar
    Route::get('/jawara/pendaftar',[JawaraPendaftarController::class,'index']);

    Route::get('/jawara/pendaftar/detail/{pendaftar}',[JawaraPendaftarController::class,'detail']);

    Route::post('/jawara/pendaftar/detail/{pendaftar}',[JawaraPendaftarController::class,'update']);

    Route::get('/jawara/pendaftar/{page}',[JawaraPendaftarController::class, 'index']);



    //student exchange event
    Route::get('/se/event',[ExchangeEventController::class, 'index']);

    Route::get('/se/event/create',[ExchangeEventController::class,'create']);

    Route::get('/se/event/{page}',[ExchangeEventController::class, 'index']);


    //student exchange event pendaftar
    Route::get('/se/pendaftar',[ExchangePendaftarController::class, 'index']);
    Route::get('/se/pendaftar/{page}',[ExchangePendaftarController::class,'index']);


    //on the job training event
    Route::get('/ojt/event',[OJTEventController::class, 'index']);
    Route::get('/ojt/event/create',[OJTEventController::class,'create']);
    Route::get('/ojt/event/{page}',[OJTEventController::class,'index']);


    //on the job training pendaftar
    Route::get('/ojt/pendaftar',[OJTPendaftarController::class, 'index']);
    Route::get('/ojt/pendaftar/{page}',[OJTPendaftarController::class, 'index']);


    //logout
    Route::post('/logout', [HomeController::class,'logout']);
});

Route::get('/try',function(){
    return view("try",[
        'title' => 'try'
    ]);
});

Route::get('/home', [Home::class, 'home'])->name('home');

Route::get('/guest',[Home::class,'home'])->name('login');

Route::post('/home',[Home::class, 'login']);

Route::post('/guest', [Home::class,'login']);

Route::get('/report/{id}',[User::class, 'report']);

Route::post('/submit/{id}',[Inkubasi::class, 'submit']);

Route::get('/inkubasi', [Inkubasi::class,'index']);

Route::get('/user', [User::class,'index'])->name('user');

Route::post('/logout',[User::class,'logout'])->name('logout');

Route::get('/latihan/{type}',[Inkubasi::class,'mulaiLatihan'])
    ->where('type','[A-Za-z-]+');

Route::get('/latihan/{type}/{kategori}/{id}',[Inkubasi::class,'latihanSoal'])
    ->where('type','[A-Za-z-]+')
    ->where('kategori','[A-Za-z]+');

Route::post('/latihan/{type}/{kategori}/{id}',[Inkubasi::class,'jawab']);

Route::get('/{kategori}/{materi}/{target}',[Inkubasi::class,'materi']);

Route::get('/jawara', function () {
    return view('jawara',[
        'title' => 'Jawara',
        'jawara' => 'selected'
    ]);
})->middleware(['auth','user']);

Route::get('/exchange', [StudentExchange::class, 'index']);

Route::get('/daftar-exchange/{id}',[StudentExchange::class, 'daftar']);

Route::post('/daftar-exchange',[StudentExchange::class,'daftar']);

Route::get('/persyaratan-exchange/{id}',[StudentExchange::class, 'persyaratan']);

Route::get('/riwayat-exchange/{id}',[StudentExchange::class,'riwayat']);

Route::get('/pelaksanaan-exchange/{id}',[StudentExchange::class, 'pelaksanaan']);

Route::get('/training', function () {
    return view('training',[
        'training' => 'selected'
    ]);
})->middleware(['auth']);

Route::get('/details', function () {
    return view('details');
});
Route::get('/detailspe/{id}', [PassController::class,'passpe']);

Route::get('/detailspm/{id}', [PassController::class,'passpm']);

Route::get('/detailsem/{id}', [PassController::class,'passem']);

Route::get('/daftarjc/{id}', [PassController::class,'passdaftarjc']);

Route::post('/daftarjc/{id}',[PendaftaranJawara::class, 'daftar']);

Route::get('/detailset/{id}', [PassController::class,'passet']);

Route::get('/detailspojt/{id}', [PassController::class,'passpojt']);

Route::get('/detailsojtt/{id}', [PassController::class,'passpojt']);
Route::get('/detailsojtm/{id}', [PassController::class,'passojtm']);

Route::get('/daftarojt/{id}', [PassController::class,'passdaftarojt']);
Route::post('/daftarojt/{id}',[PendaftaranOJT::class,'daftar']);









Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::fallback(function(){
    return redirect('home');
});
