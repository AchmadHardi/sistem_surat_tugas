<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SuratTugasController;
use App\Http\Controllers\tiketController;
use App\Http\Controllers\PembelianController;
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

Route::controller(AuthController::class)->group(function(){
    Route::get('register','register')->name('register');
    Route::post('register','registerSimpan')->name('register.simpan');

    Route::get('login','login')->name('login');
    Route::post('login','loginAksi')->name('login.aksi');

    Route::get('logout','logout')->name('logout')->middleware('auth')->name('logout');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');

    
});

Route::middleware('auth')->group(function(){
    Route::get('dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});

Route::get('dashboard', function(){
    return view('dashboard');
})->name('dashboard');

Route::controller(EmployeeController::class)->prefix('employee')->group(function(){
    Route::get('','index')->name('employee');
                        //function
    Route::get('tambah','tambah')->name('employee.tambah');
    Route::post('tambah','simpan')->name('employee.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('employee.edit');
    Route::post('edit/{id}','update')->name('employee.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('employee.hapus');
});

Route::controller(tiketController::class)->prefix('tiket')->group(function(){
    Route::get('', 'index')->name('tiket');
    Route::get('tambah', 'tambah')->name('tiket.tambah');
    Route::post('tambah', 'simpan')->name('tiket.tambah.simpan');
    Route::get('print/{id}', 'print')->name('tiket.print');
    Route::post('tiket/edit/{id}', [TiketController::class, 'update'])->name('tiket.edit.update');
    Route::get('hapus/{id}', 'hapus')->name('tiket.hapus');
    Route::get('/history', 'TiketController@history')->name('tiket.history');
    Route::post ('/tiket/{id}/e-tiket', 'TiketController@eTicket')->name('tiket.e-ticket');
    Route::get('tiket/edit/{id}', [TiketController::class, 'edit'])->name('tiket.edit');


});

Route::controller(SuratTugasController::class)->prefix('surat_tugas')->group(function(){
    Route::get('', 'index')->name('surat_tugas');
    Route::get('tambah', 'tambah')->name('surat_tugas.tambah');
    Route::post('tambah', 'simpan')->name('surat_tugas.tambah.simpan');
    Route::get('edit/{id}', 'edit')->name('surat_tugas.edit');
    Route::get('print/{id}', 'print')->name('surat_tugas.print');
    Route::post('edit/{id}', 'update')->name('surat_tugas.tambah.update');
    Route::get('hapus/{id}', 'hapus')->name('surat_tugas.hapus');
    Route::get('getbyclass/{id}', 'getbyclass')->name('getby');
});

Route::controller(PembelianController::class)->prefix('pembelian')->group(function(){
    Route::get('','index')->name('pembelian');
    Route::get('history','history')->name('pembelian.history');
    Route::get('assign/{id}/{current}', 'assign')->name('pembelian.assign');
    Route::get('print/{id}', 'print')->name('pembelian.print');
    Route::get('delete/{id}', 'delete')->name('pembelian.delete');
});

