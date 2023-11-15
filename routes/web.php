<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseListController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SubjectListController;
use App\Http\Controllers\TeacherListController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\BlockController;


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
    Route::get('/schedule/teacher',[ScheduleController::class,'showTeacherSchedule'])->name('teacherscheduleview');
    Route::get('/schedule/student',[ScheduleController::class,'showStudentSchedule'])->name('studentscheduleview');


    Route::get('/reports',[ReportsController::class,'showReports'])->name('reportsview');
    Route::get('students', [StudentController::class, 'StudentListView'])->name('studentview');
    Route::get('courselist', [CourseListController::class, 'viewCourseList'])->name('viewcourselist');

    //faculty crud routes
    Route::get('/teacherlist/edit/{id}', [TeacherListController::class, 'teacherlistEdit'])->name('teacherlist.edit');
    Route::put('/teacherlist/update/{id}', [TeacherListController:: class, 'updateFaculty'])->name('teacherlist.update');
    Route::delete('delete_faculty/{id}', [TeacherListController::class,'deleteFaculty'])->name('deletefaculty');
    Route::post('/teacherlist',[TeacherListController::class, 'facultyFetch'])->name('facultyfetch');
    Route::get('/searchfaculty',[TeacherListController::class, 'search'])->name('faculty.search');

    Route::patch('/profile', [ProfileController::class, 'updateImage'])->name('edit.profile');


    //student crud routes
    Route::get('students/{batchId}/{block}', [StudentController::class, 'StudentListView'])->name('studentview');
    Route::post('studentslist/add', [StudentController::class, 'CreateStudents'])->name('add.student');


  
    // Add Batch
Route::post('/add-batch', [BatchController::class, 'addBatch'])->name('add.batch');

// Add Block
Route::post('/add-block', [BlockController::class, 'addBlock'])->name('add.block');

//delete student
// web.php or routes/web.php
Route::delete('/delete/student/{student}', [StudentController::class , 'DeleteStudents'])->name('delete.student');

// web.php or routes/web.php 
Route::put('/update/student/{student}',[StudentController::class , 'updateStudents'])->name('update.student');

    
});
