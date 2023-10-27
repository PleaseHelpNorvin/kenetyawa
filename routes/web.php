<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SubjectListController;
use App\Http\Controllers\TeacherListController;



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

Route::get('/', [LandingPageController::class,'showLandingPage'])->name('showLandingPage');
Route::group(['middleware' => 'guest'], function(){

    Route::get('/studentID', [AuthController::class,'studentID'])->name('studentID');
    Route::get('/teacherID', [AuthController::class,'teacherID'])->name('teacherID');
    Route::get('/register',[AuthController::class,'registerView'])->name('register');
    Route::get('/login',[AuthController::class,'loginView'])->name('login');
    Route::post('/register',[AuthController::class,'registerAuth'])->name('register');
    Route::post('/login',[AuthController::class,'loginAuth'])->name('login');
});
Route::group(['middleware' => 'auth'], function(){

    Route::get('/logout', [AuthController::class,'logout'])->name('logout'); 
    Route::get('/dashboard',[DashboardController::class,'showDashboard'])->name('dashboardview');
    Route::get('/profile',[ProfileController::class,'showProfile'])->name('profileview');

    Route::get('/subjectlist',[SubjectListController::class,'showSubjectList'])->name('subjectlistview');
    Route::get('/teacherlist',[TeacherListController::class,'showTeacherList'])->name('teacherlistview');
    Route::get('/schedule',[ScheduleController::class,'showSchedule'])->name('scheduleview');
    Route::get('/reports',[ReportsController::class,'showReports'])->name('reportsview');



    Route::patch('/profile', [ProfileController::class, 'updateImage'])->name('edit.profile');

});
