<?php

// use App\Http\Controllers\Api\LaptopContoller;
use App\Http\Controllers\Api\LaptopContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/user", function (Request $request) {
    return $request->user();
})->middleware("auth:sanctum");

// Route::get('laptop', [LaptopContoller::class, 'index']);
Route::get("laptop", [LaptopContoller::class, "index"]);
Route::get("laptop/{id}", [LaptopContoller::class, "show"]);
Route::post('laptop', [LaptopContoller::class, 'store']);
Route::put('laptop/{id}', [LaptopContoller::class, 'update']);
Route::delete('laptop/{id}', [LaptopContoller::class, 'destroy']);