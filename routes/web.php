<?php
    
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\LaporanController;





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
    return view('auth.login');
});

Route::get('/index', function () {
    return view('admin.buku.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(
    [
        'register' => false
    ]
    );

   Route::group(['prefix'=>'admin','middleware',['auth']],function(){
     Route::get('buku',function(){
        return view('buku.index');
     })->middleware(['role:admin|pengguna']);

     Route::get('pengarang',function(){
        return view('pengarang.index');
     })->middleware(['role:admin']);

     });

     Route::group(['prefix' => 'admin','middleware'=>['auth','role:admin']],
        function() {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/', function () {
            return view('admin.index');
            
        });
        Route::get('laporan', [LaporanController::class, 'pinjam'])->name('getPinjam');
     Route::post('laporan', [LaporanController::class, 'reportPinjam'])->name('reportPinjam');
        });


Route::group(['prefix' => 'user','middleware'=>['auth']],
        function() {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index2'])->name('home2');

});
     route::resource('user/buku',BukuController::class);
     route::resource('admin/buku',BukuController::class);
     route::resource('admin/anggota',AnggotaController::class);
     route::resource('admin/pengembalian',PengembalianController::class);
     route::resource('admin/users',UserController::class);
     route::resource('admin/peminjaman',PinjamController::class);
     route::resource('admin/petugas',PetugasController::class);
     
     

      Route::get('admin/dashboard', 'App\Http\Controllers\AdminController@dashboard', function () {
        return view('dashboard');
    })->name('DashboardAdmin');

    Route::get('petugas/dashboard', 'App\Http\Controllers\AdminController@dashboardUser', function () {
        return view('dashboardpengguna');
    })->name('DashboardUser');




