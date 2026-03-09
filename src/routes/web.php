<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get','post'],'/',[ContactController::class,'index']);
Route::get('/reset',[ContactController::class,'reset']);
Route::post('/confirm',[ContactController::class,'confirm']);
Route::get('/thanks',[ContactController::class,'thanks']);

Route::get('/register',[AuthController::class,'register']);
Route::get('/login',[AuthController::class,'login']);

Route::get('/admin',[AdminController::class,'admin']);
