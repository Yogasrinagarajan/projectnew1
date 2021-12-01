<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Employee_CustomerController;
use App\Http\Controllers\CustomerprofileController;
use App\Http\Controllers\AdminTeamController;
use App\Http\Controllers\EventController;


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

    Route::get('/admindashboard', [HomeController::class, 'admin'])->name('admin'); 
    Route::resource('/customer',CustomerController::class);
	Route::resource('/employee',EmployeeController::class);
	Route::resource('/team',AdminTeamController::class);
    Route::get('/sendmail',[EventController::class,'index']);
    Route::post('/sendmailevent',[EventController::class,'create'])->name('mail');


});

Route::group(['prefix'=>'employee', 'middleware'=>['isemp','auth']], function(){

    Route::get('/employeedashboard', [HomeController::class, 'emp'])->name('emp'); 
    Route::resource('/emp',Employee_CustomerController::class);
    });

Route::group(['prefix'=>'customer', 'middleware'=>['iscus','auth']], function(){

    Route::get('/customerdashboard', [HomeController::class, 'cus'])->name('cus');
    Route::resource('/customerprofile',CustomerprofileController::class); // Customer Home
}); 

Route::get('/export',[AdminTeamController::class,'export']);
Route::get('/importfile',[AdminTeamController::class,'importfile']);
Route::post('/import',[AdminTeamController::class,'import'])->name('import');
//Route::get('event',[EventController::class,'index']);



    