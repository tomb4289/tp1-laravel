<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CityController;

// Home/Dashboard Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Student Routes
Route::resource('students', StudentController::class);

// City Routes
Route::resource('cities', CityController::class);