<?php

use App\Http\Controllers\AppFunctionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\app_route_controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DisplayRecordController;
use App\Http\Controllers\submit_form_data;

Route::get('/login',[app_route_controller::class,'login']);
Route::get('/register', [AppFunctionController::class, 'show_form']);
Route::get('/get-states', [AppFunctionController::class, 'getStates']);
Route::get('/get-cities', [AppFunctionController::class, 'getCities']);
Route::post('/store_data', [submit_form_data::class, 'store_data']);


Route::post('/login',[AuthController::class,'login']);
Route::get('/displaypage', [AuthController::class, 'displayPage']);

Route::get('/users', [DisplayRecordController::class, 'index']);
// Route::get('/users-data', [DisplayRecordController::class, 'getData']);
Route::get('/city_data', [DisplayRecordController::class, 'getData']);



// Route::get('/register/states', [app_function_controller::class, 'showStates']);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view('layout');
// });
// Route::get('/register', function () {
//     return view('register');
// });