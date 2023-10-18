<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => 'guest'], function(){

    Route::get('/register',[AuthController::class,'registerView'])->name('register');
    Route::get('/login',[AuthController::class,'loginView'])->name('login');
    Route::post('/register',[AuthController::class,'registerAuth'])->name('register');
    Route::post('/login',[AuthController::class,'loginAuth'])->name('login');
});
Route::group(['middleware' => 'auth'], function(){

    Route::get('/logout', [AuthController::class,'logout'])->name('logout'); 
    Route::get('/home',[IndexController::class,'index'])->name('homeview');
    Route::get('/profile',[ProfileController::class,'showProfile'])->name('profileview');
    Route::get('/dashboard',[DashboardController::class,'showDashboard'])->name('dashboardview');

});
