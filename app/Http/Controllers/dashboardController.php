<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function kelas()
    {
        return view('dashboard.kelas.index');
    }

    public function siswa()
    {
        return view('dashboard.student.index');
    }
}
