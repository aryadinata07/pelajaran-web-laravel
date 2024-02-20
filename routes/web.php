<?php

use Illuminate\Support\Facades\Route;
use App\Models\Students;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\extracurricularCtr;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\dashboardStudentController;
use App\Http\Controllers\dashboardKelascontroller;



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

// Login Register

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [registerController::class, 'index']);
Route::post('/register', [registerController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::prefix('dashboard/student')->middleware('auth')->group(function () {
    Route::get('/', [dashboardStudentController::class, 'index']);
    Route::get('/create', [dashboardStudentController::class, 'create']);
    Route::get('/detail/{student}', [dashboardStudentController::class, 'show']);
    Route::post('/add', [dashboardStudentController::class, 'store']); 
    Route::get('/edit/{id}', [dashboardStudentController::class, 'edit']);
    Route::patch('/update/{id}', [dashboardStudentController::class, 'update']);
    Route::delete('/delete/{student}', [dashboardStudentController::class, 'destroy']);
});

Route::prefix('dashboard/kelas')->middleware('auth')->group(function () {
    Route::get('/', [dashboardKelascontroller::class, 'index']);
    Route::get('/create', [dashboardKelascontroller::class, 'create']);
    Route::post('/store', [dashboardKelascontroller::class, 'store']);
    Route::get('/edit/{id}', [dashboardKelascontroller::class, 'edit']);
    Route::patch('/update/{id}', [dashboardKelascontroller::class, 'update']);
    Route::delete('/destroy/{id}', [dashboardKelascontroller::class, 'destroy']);
});

Route::get('/dashboard', function () {
    return view('dashboard.app', [
        "title" => "index"
    ]);
})->middleware('auth');
Route::redirect('/dashboard', '/dashboard/student');

