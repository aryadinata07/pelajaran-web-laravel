<?php

use Illuminate\Support\Facades\Route;
use App\Models\Students;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\extracurricularCtr;
use App\Http\Controllers\kelasController;


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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home',[
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "nama" => "arya",
        "kelas" => "11 PPLG 1",
        "foto" => "gambar.jpg"
    ]);
});

Route::get('/extra', [extracurricularCtr::class, 'index']); 

Route::group(['prefix' => '/student'], function () {
    Route::get('/all', [StudentsController::class, 'index']);
    Route::get('/detail/{student}', [StudentsController::class, 'show']);
    Route::get('/create', [StudentsController::class, 'create']);
    Route::post('/add', [StudentsController::class, 'store']); 
    Route::delete('/delete/{student}', [StudentsController::class, 'destroy']);
    Route::get('/edit/{student}', [StudentsController::class, 'edit']);
    Route::put('/update/{student}', [StudentsController::class, 'update']);
});


Route::group(['prefix' => 'kelas'], function () {
    Route::get('/', [KelasController::class, 'index']);
    Route::get('/create', [KelasController::class, 'create']);
    Route::post('/store', [KelasController::class, 'store']);
    Route::get('/edit/{id}', [KelasController::class, 'edit']);
    Route::patch('/update/{id}', [KelasController::class, 'update']);
    Route::delete('/destroy/{id}', [KelasController::class, 'destroy']);
    Route::get('/detail/{id}', [KelasController::class, 'detail'])->name('kelas.detail');
});