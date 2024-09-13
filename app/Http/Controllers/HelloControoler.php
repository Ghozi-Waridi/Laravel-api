<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloControoler extends Controller
{
    public function coba(){
        $nama = "ghozi";
        $data = ['itudia' => $nama];
        return view("hello", $data);
    }

    public function cobaCoba($angka = 0){
        $angka2 = 10;
        $hasil = $angka + $angka2;
        $data = [
            "hasil" => $hasil,
            "angka10" => 10,
            "itudia" => "pengguna"
        ];
        return view("hello", $data);

    }
}
