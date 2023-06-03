<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\AgendaController;
use Illuminate\Support\Facades\Auth;



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
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

    // dashboard
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    //jadwal
    Route::resource('jadwals', JadwalController::class);
    //tugas
    Route::resource('tugas', TugasController::class);
    // agenda
    Route::resource('agenda', AgendaController::class);
    Route::get('/agenda/{id}/edit', 'AgendaController@edit')->name('agenda.edit');
    Route::put('/agenda/{id}', 'AgendaController@update')->name('agenda.update');
    Route::delete('/agenda/{id}', 'AgendaController@destroy')->name('agenda.destroy');
});


Auth::routes();
