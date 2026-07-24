<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Car;
use App\Models\Marque;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/cars', function () {
    return Car::all();
});
Route::get('/marques', function () {
    return Marque::all();
});