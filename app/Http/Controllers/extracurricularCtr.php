<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\extracurricular; 


class extracurricularCtr extends Controller
{
    public static function index(){
        return view ('extracurricular',[
            "title" => "extracurricular",
            "extracurricular" => extracurricular::all()
        ]);
    }
}
