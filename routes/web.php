<?php

use App\Http\Controllers\Logowaniecontroller;
use App\Http\Controllers\Rejestracjacontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/panel', function(){return view('mainpanel');});
Route::post('/rejestracja', [Rejestracjacontroller::class, 'rejestracja']);
Route::post('/logowanie', [Logowaniecontroller::class, 'logowanie']);
Route::get('/main', function(){return view('main');});