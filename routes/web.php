<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\IndustryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('form');
});

Route::get('/industry', [IndustryController::class, 'index']);

Route::post('/form', [FormController::class, 'store']);