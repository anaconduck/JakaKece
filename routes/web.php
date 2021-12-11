<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Admin\PushMateri;
use App\Http\Controllers\Admin\PushOjtEvent;
use App\Http\Controllers\Admin\PushOjtMagang;
use App\Http\Controllers\Admin\PushPractice;
use App\Http\Controllers\Admin\TanyaAdmin;
use App\Http\Controllers\Admin\UpdateExchangePendaftar;
use App\Http\Controllers\Admin\UpdateMateri;
use App\Http\Controllers\Admin\UpdateOjtMagang;
use App\Http\Controllers\Admin\UpdateOjtMk;
use App\Http\Controllers\Admin\UpdateOjtPendaftar;
use App\Http\Controllers\Admin\UpdatePractice;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inkubasi;
use App\Http\Controllers\Home;
use App\Http\Controllers\User;
use App\Http\Livewire\Admin\HomeController;
use App\Http\Livewire\Admin\MateriController;
use App\Http\Livewire\Admin\OjtEventController;
use App\Http\Livewire\Admin\OjtMagang;
use App\Http\Livewire\Admin\OjtMkController;
use App\Http\Livewire\Admin\OjtPendaftarController;
use App\Http\Livewire\Admin\OjtTujuanController;
use App\Http\Livewire\Admin\PracticeController;
use App\Http\Livewire\Admin\SEPendaftar;
use App\Http\Livewire\Admin\StatistikController;
use App\Http\Livewire\Admin\Tanya;
use App\Http\Livewire\Admin\UpdateOjtEvent;
use App\Http\Livewire\ExchangeTujuan;
use App\Http\Livewire\JawaraCenter;
use App\Http\Livewire\JawaraPendaftar;
use App\Http\Livewire\MateriC;
use App\Http\Livewire\MKExchange;
use App\Http\Livewire\PracticeC;
use App\Http\Livewire\PracticeCSec;
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

Route::get('/try', function(){
    return view('/login');
});

//access file
Route::get('/materi/{file}', function(Request $request, $file){
    return Storage::download("public/materi/$file");
})->middleware('auth');

Route::get('/jawara/event/{file}', function(Request $request, $file){
    return Storage::download("public/jawara/event/$file");
})->middleware('auth');

Route::get('/storage/jawara/pendanaan/{file}', function($file){
    return Storage::download("jawara/pendanaan/$file");
})->middleware(['auth']);

Route::get('/storage/berkas_student_exchange/{file}', function($file){
    return Storage::download("berkas_student_exchange/$file");
})->middleware(['auth']);

Route::get('/storage/exchange/tujuan/{file}', function ($file){
    return Storage::download('exchange/tujuan/'.$file);
})->middleware('auth');

Route::get('/storage/ojt/pelaksanaan/{file}', function ($file){
    return Storage::download("ojt/pelaksanaan/$file");
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
    Route::get('/se/tujuan/{tujuan}',\App\Http\Livewire\Admin\UpdateExchangeTujuan::class);
    Route::post('/se/tujuan/{tujuan}',[UpdateExchangeTujuan::class, 'update']);

    //matkul se
    Route::get('/se/mk',MKExchange::class);
    Route::get('/se/mk/create',[PushMKExchange::class,'index']);
    Route::post('/se/mk/create',[PushMKExchange::class,'push']);
    Route::get('/se/mk/{mk}',[UpdateMKExchange::class,'index']);
    Route::post('/se/mk/{mk}',[UpdateMKExchange::class,'update']);

    //pendaftar se
    Route::get('/se/pendaftar',SEPendaftar::class);
    Route::get('/se/pendaftar/{pendaftar}', [UpdateExchangePendaftar::class, 'index']);
    Route::post('/se/pendaftar/{pendaftar}', [UpdateExchangePendaftar::class, 'update']);

    //ojt event
    Route::get('/ojt/event', OjtEventController::class);
    Route::get('/ojt/event/create',[PushOjtEvent::class, 'index']);
    Route::post('/ojt/event/create',[PushOjtEvent::class, 'push']);
    Route::get('/ojt/event/{event}',UpdateOjtEvent::class);

    //ojt tujuan
    Route::get('/ojt/tujuan/', OjtTujuanController::class);
    Route::get('/ojt/tujuan/create', [PushOjtTujuan::class, 'index']);
    Route::post('/ojt/tujuan/create', [PushOjtTujuan::class, 'push']);
    Route::get('/ojt/tujuan/{tujuan}', [UpdateOjtTujuan::class, 'index']);
    Route::post('/ojt/tujuan/{tujuan}', [UpdateOjtTujuan::class, 'update']);

    //ojt mk
    Route::get('/ojt/mk', OjtMkController::class);
    Route::get('/ojt/mk/create', [PushOjtMk::class, 'index']);
    Route::post('/ojt/mk/create',[PushOjtMk::class, 'push']);
    Route::get('/ojt/mk/{mk}', [UpdateOjtMk::class, 'index']);
    Route::post('/ojt/mk/{mk}', [UpdateOjtMk::class, 'update']);

    //ojt magang
    Route::get('/ojt/magang',OjtMagang::class);
    Route::get('/ojt/magang/create', [PushOjtMagang::class, 'index']);
    Route::post('/ojt/magang/create', [PushOjtMagang::class,'push']);
    Route::get('/ojt/magang/{magang}',[UpdateOjtMagang::class, 'index']);
    Route::post('/ojt/magang/{magang}', [UpdateOjtMagang::class, 'update']);

    //pendaftar ojt
    Route::get('/ojt/pendaftar', OjtPendaftarController::class);
    Route::get('/ojt/pendaftar/{pendaftar}',[UpdateOjtPendaftar::class, 'index']);
    Route::post('/ojt/pendaftar/{pendaftar}', [UpdateOjtPendaftar::class, 'update']);
    Route::get('/ojt/yzyzla/{pendaftar}/{ind}', [UpdateOjtPendaftar::class, 'hapus']);

    //tanya admin
    Route::get('/{menu}/tanya',Tanya::class);

    Route::get('/jawab/{menu}/{id}', [TanyaAdmin::class, 'jawab']);
    Route::post('/jawab/{menu}/{id}', [TanyaAdmin::class, 'kirim']);


    Route::post('/logout', function (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('home');
    });
});


//buka halaman home
Route::get('/home', [Home::class, 'home'])->name('home');
Route::get('/',function(){
    return redirect()->route('home');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

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

//memulai latihan pada sesi tertentu
Route::get('/latihan/{course}/{sesi}/{tipe}',PracticeCSec::class)
    ->where('course','[A-Za-z-]+')
    ->middleware(['auth']);

//memulai test
Route::get('/test/{course}', TestC::class)
    ->where('course','[A-Za-z-]+')
    ->middleware(['auth']);

//membuka report tertentu
Route::get('/report/practice/{historyPractice}',[User::class, 'report']);

//list riwayat jawara
Route::get('/user/riwayat-jawara',[User::class, 'riwayatJawara']);

//info pendaftar
Route::get('/user/riwayat-jawara/{pendaftar}',[User::class, 'riwayatJawaraPendaftar']);

//delete or upload file
Route::post('/user/riwayat-jawara/{pendaftar}',[User::class, 'updateRiwayatJawaraPendaftar']);

//list riwayat latihan
Route::get('/user/riwayat-latihan',[User::class, 'riwayatLatihan']);

//info riwayat latihan
Route::get('/user/riwayat-latihan/{riwayat}', [User::class,'detailRiwayatLatihan']);

//list riwayat test
Route::get('/user/riwayat-test', [User::class, 'riwayatTest']);

//info riwayat test
Route::get('/user/riwayat-test/{riwayat}',[User::class, 'detailRiwayatTest']);

//list riwayat se
Route::get('/user/riwayat-se',[User::class, 'riwayatSE']);

//delete or upload file
Route::post('/user/riwayat-se/{riwayat}', [User::class, 'updateRiwayatSE']);

//info riwayat se
Route::get('/user/riwayat-se/{riwayat}', [User::class, 'detailRiwayatSE']);

//list riwayat magang
Route::get('/user/riwayat-magang',[User::class, 'riwayatMagang']);

//info riwayat magang
Route::get('/user/riwayat-magang/{riwayat}', [User::class, 'detailRiwayatMagang']);

//delete or upload file
Route::post('/user/riwayat-magang/{riwayat}', [User::class, 'updateRiwayatMagang']);

Route::get('/jawara', [Jawara::class, 'index']);

Route::get('/jawara/{event}', [Jawara::class, 'showDaftar'])
    ->middleware(['auth']);

Route::post('jawara/{event}',[Jawara::class, 'daftar'])
    ->middleware(['auth']);

Route::get('/jawara/detail/{event}',[Jawara::class, 'detail'])
    ->middleware('auth');

Route::get('/exchange',[StudentExchange::class, 'index']);

Route::get('/exchange/riwayat/{tujuan}', [StudentExchange::class, 'detail']);

Route::get('/exchange/{lokasi}/{tujuan}',[StudentExchange::class, 'showPaket'])
    ->middleware('auth');

Route::post('/exchange/{lokasi}/{tujuan}',[StudentExchange::class, 'showDaftar'])
    ->middleware('auth');

Route::post('/exchange/{lokasi}/{tujuan}/{identity}', [StudentExchange::class, 'daftar'])
    ->middleware('auth');

Route::get('/training', [Ojt::class, 'index'] );

Route::get('/training/{tujuan}',[Ojt::class,'showPaket'])
    ->middleware('auth');

Route::get('/training/terlaksana/{paket}',[Ojt::class, 'showTerlaksana'])
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
