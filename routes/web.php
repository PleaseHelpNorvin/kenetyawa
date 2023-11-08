<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\StudentController;
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
    //login/register routes
    Route::get('/studentID', [AuthController::class,'studentID'])->name('studentID');
    Route::get('/teacherID', [AuthController::class,'teacherID'])->name('teacherID');
    Route::get('/register',[AuthController::class,'registerView'])->name('register');
    Route::get('/login',[AuthController::class,'loginView'])->name('login');
    //Auths routes
    Route::post('/register',[AuthController::class,'registerAuth'])->name('register');
    Route::post('/login',[AuthController::class,'loginAuth'])->name('login');
});
Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [AuthController::class,'logout'])->name('logout'); 

    // pages routes
    Route::get('/dashboard',[DashboardController::class,'showDashboard'])->name('dashboardview');
    Route::get('/profile',[ProfileController::class,'showProfile'])->name('profileview');
    Route::get('/subjectlist',[SubjectListController::class,'showSubjectList'])->name('subjectlistview');
    Route::get('/teacherlist',[TeacherListController::class,'showTeacherList'])->name('teacherlistview');
    Route::get('/schedule',[ScheduleController::class,'showSchedule'])->name('scheduleview');
    Route::get('/reports',[ReportsController::class,'showReports'])->name('reportsview');
    Route::get('students', [StudentController::class, 'StudentListView'])->name('studentview');

    Route::get('/teacherlist/edit/{id}', [TeacherListController::class, 'teacherlistEdit'])->name('teacherlist.edit');
    Route::put('/teacherlist/update/{id}', [TeacherListController:: class, 'updateFaculty'])->name('teacherlist.update');

    //form routes
    Route::post('/teacherlist',[TeacherListController::class, 'facultyFetch'])->name('facultyfetch');

    //edit routes
    Route::patch('/profile', [ProfileController::class, 'updateImage'])->name('edit.profile');

    //delete routes
    Route::delete('delete_faculty/{id}', [TeacherListController::class,'deleteFaculty'])->name('deletefaculty');

    Route::get('studentslist', [StudentController::class, 'DisplayStudents'])->name('displaystudents');
});
