<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\JobListingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('form');
});

Route::get('/industry', [IndustryController::class, 'index']);

Route::get('/skills', [SkillsController::class, 'index']);

Route::post('/form', [FormController::class, 'store']);
Route::get('/joblisting/create', [JobListingController::class, 'create'])->name('joblisting.create');
Route::post('/joblisting', [JobListingController::class, 'store']);