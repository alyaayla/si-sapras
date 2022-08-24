<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaprasController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaprasPinjamController;
use App\Http\Controllers\Peminjam\SaprasPeminjamController;
use App\Http\Controllers\Peminjam\PeminjamanPeminjamController;
use App\Http\Controllers\Peminjam\SaprasPinjamPeminjamController;
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
Route::group(['middleware' => ['is_admin', 'auth']], function() 
{
    Route::get('/dasboard/admin', function () {
        return view('admin.index');
    });

    Route::resource('/sapras', SaprasController::class);
    Route::get('/fetchAll-sapras', [SaprasController::class, 'fetchAll'])->name('fetchAllSapras');
    Route::delete('/delete-sapras', [SaprasController::class, 'destroy'])->name('admin.deleteSapras');

    Route::resource('/peminjaman', PeminjamanController::class);
    Route::get('/fetchAll-peminjaman', [PeminjamanController::class, 'fetchAll'])->name('fetchAllPeminjaman');
    Route::post('/update-peminjaman', [PeminjamanController::class, 'updatePinjam'])->name('admin.updatePinjam');
    Route::delete('/delete-peminjaman', [PeminjamanController::class, 'destroy'])->name('admin.deletePinjam');

    Route::resource('/ruangan', RuanganController::class);
    Route::delete('/delete-ruangan', [RuanganController::class, 'destroy'])->name('admin.deleteRuangan');

    Route::resource('/user', UserController::class);
    Route::delete('/delete-user', [UserController::class, 'destroy'])->name('admin.deleteUser');

    Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
});

Route::get('/', function () {
    return view('auth.login');
});

// Route::resource('/sapraspinjam', SaprasPinjamController::class);

Route::get('getCourse/{id}', function ($id) {
    $ruangan = App\Models\Ruangan::latest()->get();
    foreach ($ruangan as $item) {
        $sapras = App\Models\Sapras::where('ruangan_id', $item->id)->get();
        return response()->json($sapras);
    }
});

// Route::get('/peminjaman/admin', function () {
//     return view('admin.peminjaman.index');
// });

// Route::get('/admin/user', function () {
//     return view('admin.user.index');
// });

// Route::get('/sapras/admin', function () {
//     return view('admin.sapras.index');
// });
Route::group(['middleware' => ['is_admin', 'auth']], function() 
{
    Route::get('peminjam', function () {
        return view('peminjam.index');
    });

    Route::get('about', function () {
        return view('peminjam.about.index');
    });

    Route::resource('/datasapras', SaprasPeminjamController::class);
    Route::resource('/datapinjam', PeminjamanPeminjamController::class);
    Route::get('/datapinjam-detail', [PeminjamanPeminjamController::class, 'detail'])->name('datapinjam.detail');
    Route::get('/datasapraspinjam/{id}', [App\Http\Controllers\Peminjam\SaprasPinjamPeminjamController::class, 'index']);

    // Peminjam Barang
    Route::get('/formpinjam', [App\Http\Controllers\Peminjam\FormPeminjamController::class, 'index']);
    Route::post('/formpinjam', [App\Http\Controllers\Peminjam\FormPeminjamController::class, 'pinjam'])->name('form.peminjam.create');

    Route::get('print/{id}', [PeminjamanPeminjamController::class, 'print']);

    // Peminjaman
    Route::get('sapras_pinjam/{id}', [App\Http\Controllers\SaprasPinjamController::class, 'index']);
});
// Route::get('datasapras', function () {
//     return view('peminjam.datasapras.index');
// });

// Route::get('datapinjam', function () {
//     return view('peminjam.datapinjam.index');
// });

Route::get('matrixadmin', function () {
    return view('admin.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [HomeController::class, 'logout']);

// Route::get('/pilih_ruangan', function () {
//     $category = App\Models\Ruangan::all();
//     return view('welcome',['category' => $category]);
// });

Route::get('getSarpas/{id}', function ($id) {
    $ruangan = App\Models\Sapras::where('ruangan_id',$id)->get();
    return response()->json($ruangan);
});

// Peminjam
// Route::get('/peminjam/data_sapras', [App\Http\Controllers\SaprasPinjamController::class, 'index']);