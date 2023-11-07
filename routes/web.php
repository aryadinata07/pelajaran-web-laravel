<?php

use Illuminate\Support\Facades\Route;
use App\Models\Students;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\extracurricularCtr;



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

Route::get('/student', [StudentsController::class, 'index']); 

Route::get('/extra', [extracurricularCtr::class, 'index']); 

Route::get('/student/detail/{student}', [StudentsController::class, 'show']);




