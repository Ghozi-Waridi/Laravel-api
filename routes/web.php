<?php

use App\Http\Controllers\HelloControoler;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get("/hello", function(){
    return "<h1> ini halaman Hello </h1>";
});

Route::get('/hello2', [HelloControoler::class, 'coba']);
Route::get('/hello3{angka}', [HelloControoler::class, 'cobaCoba']);
