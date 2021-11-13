<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;




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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isadmin','auth']], function(){

    Route::get('/admindashboard', [HomeController::class, 'admin'])->name('admin'); // Admin Home
});

Route::group(['prefix'=>'emp', 'middleware'=>['isemp','auth']], function(){

    Route::get('/employeedashboard', [HomeController::class, 'emp'])->name('emp'); // Employee Home
});

Route::group(['prefix'=>'cus', 'middleware'=>['iscus','auth']], function(){

    Route::get('/customerdashboard', [HomeController::class, 'cus'])->name('cus'); // Customer Home
});

Route::resource('/customer',CustomerController::class);
Route::resource('/employee',EmployeeController::class);