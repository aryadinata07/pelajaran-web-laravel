<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class extracurricular 
{
    private static $extracurricular = [
        [
            'id' => '1',
            'nama' => 'Sepak Bola',
            'pembina' => 'Wak Altan',
            'deskripsi' => 'enak buat mainan'
        ],
        [
            'id' => '2',
            'nama' => 'Basket',
            'pembina' => 'Wak John Doe',
            'deskripsi' => 'olahraga tim yang seru'
        ],
        [
            'id' => '3',
            'nama' => 'Renang',
            'pembina' => 'Wak Jane Smith',
            'deskripsi' => 'baik untuk kesehatan tubuh'
        ],
        [
            'id' => '4',
            'nama' => 'Tennis',
            'pembina' => 'Wak Bob Johnson',
            'deskripsi' => 'diperlukan raket dan bola kecil'
        ],
        [
            'id' => '5',
            'nama' => 'Voli',
            'pembina' => 'Wak Sarah Wilson',
            'deskripsi' => 'permainan tim yang seru'
        ],
        ];

    public static function all(){
        return self::$extracurricular;
    }
}

