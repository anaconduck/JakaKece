<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Admin\PushMateri;
use App\Http\Controllers\Admin\PushPractice;
use App\Http\Controllers\Admin\UpdateMateri;
use App\Http\Controllers\Admin\UpdatePractice;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inkubasi;
use App\Http\Controllers\Home;
use App\Http\Controllers\User;
use App\Http\Livewire\Admin\HomeController;
use App\Http\Livewire\Admin\MateriController;
use App\Http\Livewire\Admin\PracticeController;
use App\Http\Livewire\Admin\StatistikController;
use App\Http\Livewire\ExchangeTujuan;
use App\Http\Livewire\JawaraCenter;
use App\Http\Livewire\JawaraPendaftar;
use App\Http\Livewire\MateriC;
use App\Http\Livewire\MKExchange;
use App\Http\Livewire\PracticeC;
use App\Http\Livewire\TestC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

//access file
Route::get('/materi/{file}', function(Request $request, $file){
    return Storage::download("public/materi/$file");
})->middleware('auth');

Route::get('/jawara/event/{file}', function(Request $request, $file){
    return Storage::download("public/jawara/event/$file");
})->middleware('auth');

//admin
Route::name('admin.')->middleware(['auth','admin'])->prefix('admin')->group(function(){
    //homepage
    Route::get('/', HomeController::class)->name('home');

    //statistik
    Route::get('/statistik', StatistikController::class);

    //halaman materi
    Route::get('/inkubasi/materi',MateriController::class);
    Route::get('/inkubasi/materi/create',[PushMateri::class, 'index']);
    Route::post('/inkubasi/materi/create', [PushMateri::class, 'push']);
    Route::get('/inkubasi/materi/{materi}', [UpdateMateri::class, 'index']);
    Route::post('/inkubasi/materi/{materi}', [UpdateMateri::class, 'update']);

    //practice
    Route::get('/inkubasi/practice',PracticeController::class);
    Route::get('/inkubasi/practice/create', [PushPractice::class, 'index']);
    Route::post('/inkubasi/practice/create', [PushPractice::class, 'push']);
    Route::get('/inkubasi/practice/{practice}', [UpdatePractice::class, 'index']);
    Route::post('/inkubasi/practice/{practice}',[UpdatePractice::class, 'update']);

    //jawaraCenter
    Route::get('/jawara/event', JawaraCenter::class);
    Route::get('/jawara/event/create', [PushJawaraEvent::class, 'index']);
    Route::post('/jawara/event/create',[PushJawaraEvent::class, 'push']);
    Route::get('/jawara/event/{event}', [UpdateJawaraEvent::class, 'index']);
    Route::post('/jawara/event/{event}',[UpdateJawaraEvent::class, 'update']);

    //Jawara Pendaftar
    Route::get('/jawara/pendaftar', JawaraPendaftar::class);
    Route::get('/jawara/pendaftar/{pendaftar}',[UpdateJawaraPendaftar::class, 'index']);
    Route::post('/jawara/pendaftar/{pendaftar}',[UpdateJawaraPendaftar::class,'update']);

    //tujuan SE
    Route::get('/se/tujuan', ExchangeTujuan::class);
    Route::get('/se/tujuan/create',[PushExchangeTujuan::class, 'index']);
    Route::post('/se/tujuan/create',[PushExchangeTujuan::class, 'push']);
    Route::get('/se/tujuan/{tujuan}',[UpdateExchangeTujuan::class,'index']);
    Route::post('/se/tujuan/{tujuan}',[UpdateExchangeTujuan::class, 'update']);

    //matkul se
    Route::get('/se/mk',MKExchange::class);
    Route::get('/se/mk/create',[PushMKExchange::class,'index']);
    Route::post('/se/mk/create',[PushMKExchange::class,'push']);
    Route::get('/se/mk/{mk}',[UpdateMKExchange::class,'index']);
    Route::post('/se/mk/{mk}',[UpdateMKExchange::class,'update']);

    //Student Exchange

    Route::post('/logout', function (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('home');    
    });
});

Route::get('/try',function(){
    return view("try",[
        'title' => 'try',

    ]);
});

//buka halaman home
Route::get('/home', [Home::class, 'home'])->name('home');
Route::get('/guest',[Home::class,'home'])->name('login');
Route::get('/',function(){
    return redirect()->route('home');
});

//reset password
Route::get('/forgot-password', [Home::class, 'forgotPassword'])->middleware('guest')->name('password.request');

Route::post('/forgot-password',[Home::class, 'sendResetLink'])
->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}',[Home::class, 'resetPassword'])->middleware('guest')->name('password.reset');

Route::post('/reset-password',[Home::class, 'handlingResetPassword'])->middleware('guest')->name('password.update');

//proses login
Route::post('/home',[Home::class, 'login']);
Route::post('/guest', [Home::class,'login']);

//membuka inkubasi
Route::get('/inkubasi', [Inkubasi::class,'index']);

//membuka halaman user
Route::get('/user', [User::class,'index'])->name('user');

//proses logout
Route::post('/logout',[User::class,'logout'])->name('logout');

//memulai practice
Route::get('/latihan/{course}',PracticeC::class)
    ->where('course','[A-Za-z-]+')
    ->middleware(['auth']);

//memulai test
Route::get('/test/{course}', TestC::class)
    ->where('course','[A-Za-z-]+')
    ->middleware(['auth']);

//membuka report tertentu
Route::get('/report/practice/{historyPractice}',[User::class, 'report']);

Route::get('/jawara', [Jawara::class, 'index']);

Route::get('/jawara/{event}', [Jawara::class, 'showDaftar'])
    ->middleware(['auth']);

Route::post('jawara/{event}',[Jawara::class, 'daftar'])
    ->middleware(['auth']);

Route::get('/jawara/detail/{event}',[Jawara::class, 'detail'])
    ->middleware('auth');

Route::get('/exchange',[StudentExchange::class, 'index']);

Route::get('/exchange/{lokasi}/{tujuan}',[StudentExchange::class, 'showPaket'])
    ->middleware('auth');

Route::get('/exchange/{lokasi}/{tujuan}/{paket}',[StudentExchange::class, 'showDaftar'])
    ->middleware('auth');

Route::post('/exchange/{lokasi}/{tujuan}/{paket}', [StudentExchange::class, 'daftar'])
    ->middleware('auth');

Route::get('/training', [Ojt::class, 'index'] );

Route::get('/training/{tujuan}',[Ojt::class,'showPaket'])
    ->middleware('auth');

Route::get('/training/terlaksana/{paket}',[Ojt::class, 'showTerlaksana'])
    ->middleware('auth');

Route::get('/training/riwayat/{tujuan}',[Ojt::class, 'riwayat'])
    ->middleware('auth');

Route::get('/training/{tujuan}/{paket}',[Ojt::class,'showPendaftaran'])
    ->middleware('auth');

Route::post('/training/{tujuan}/{paket}',[Ojt::class,'daftar'])
    ->middleware('auth');



Route::post('/logout', [User::class, 'logout'])
    ->middleware('auth');

Route::get('/{course}/{sesi}/{target}',MateriC::class)
    ->where('target','[0-9]+')
    ->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::fallback(function(){
    abort(404);
});
