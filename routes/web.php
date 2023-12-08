<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\IndexController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseListController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SubjectListController;
use App\Http\Controllers\TeacherListController;
use App\Http\Controllers\CalendarEventController;


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
    Route::post('/teacheridpost',[AuthController::class,'teacherIdPost'])->name('teacheridpost');
    Route::post('/studentidpost', [AuthController::class,'studentIdPost'])->name('studentidpost');
});

    Route::get('/teacherinfo', [AuthController::class, 'teacherInfo'])->name('teacherinfo');
    Route::get('/studentinfo', [AuthController::class, 'studentInfo'])->name('studentinfo');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [AuthController::class,'logout'])->name('logout'); 
    // dashboard routes
    Route::get('/dashboard',[DashboardController::class,'showDashboard'])->name('dashboardview');
    // Route::get('courselist', [CgourseListController::class, 'viewCourseList'])->name('viewcourselist');

    //faculty crud routes
    Route::get('/teacherlist',[TeacherListController::class,'showTeacherList'])->name('teacherlistview');
    Route::get('/searchfaculty',[TeacherListController::class, 'search'])->name('faculty.search');
    Route::get('/addteacher', [TeacherListController::class, 'addteacher'])->name('addteacher');
    Route::get('/editteacher{id}', [TeacherListController::class, 'editteacher'])->name('editteacher');
    Route::delete('delete_faculty/{id}', [TeacherListController::class,'deleteFaculty'])->name('deletefaculty');
    Route::post('/teacherlist',[TeacherListController::class, 'facultyFetch'])->name('facultyfetch');
    Route::put('/updateTeacher/{id}',[TeacherListController::class, 'updateTeacher']);
   
    //Profile Routes
    Route::patch('/profile', [ProfileController::class, 'updateImage'])->name('edit.profile');
    Route::get('/profile',[ProfileController::class,'showProfile'])->name('profileview');

    //student crud routes
    Route::get('students/{batchId}/{block}', [StudentController::class, 'StudentListView'])->name('studentview');
    Route::get('/students/{batch_id}/{block}/{status}', [StudentController::class, 'StudentListView'])->name('studentview.status');

    Route::get('studentslistadd/{batchId}/{block}', [StudentController::class, 'showaddstudent'])->name('add.student');
    Route::post('studentslistadd/{batchId}/{block}', [StudentController::class, 'CreateStudents'])->name('add.savestudent');
    
    // Add BatchshowTeacherSchedule
    Route::post('/add-batch', [BatchController::class, 'addBatch'])->name('add.batch');
    // Add Block
    Route::post('/add-block', [BlockController::class, 'addBlock'])->name('add.block');
    //delete student
    // web.php or routes/web.php
    Route::delete('/delete/student/{student}', [StudentController::class , 'DeleteStudents'])->name('delete.student');
    // web.php or routes/web.php 
    Route::put('/update/student/{student}',[StudentController::class , 'updateStudents'])->name('update.student');
    Route::get('/update/studentview/{student}', [StudentController::class, 'showeditstudent'])->name('view.student');

    // Define routes to handle batch and block deletion
    Route::delete('/delete/batch/{batchId}', [StudentController::class, 'deleteBatchAndAssociatedBlocksAndStudents'])->name('deleteBatch');
    Route::delete('/delete/block/{block_id}', [StudentController::class, 'deleteBlockAndAssociatedStudents'])->name('deleteBlock');


    //subjectlist routes
    Route::get('/subjectlist',[SubjectListController::class,'showSubjectList'])->name('subjectlistview');
    Route::get('/addsubject',[SubjectListController::class,'addSubjectpage'])->name('addsubjectpage');
    Route::post('/addsubjectpost',[SubjectListController::class,'addSubject'])->name('addsubjectpost');
    Route::get('/editsubject/{id}', [SubjectListController::class, 'editSubjectpage'])->name('editsubjectpage');
    Route::put('/updateasubject{id}', [SubjectListController::class,'updateSubject'] )->name('updatesubject');
    Route::delete('/deletesubject{id}', [SubjectListController::class, 'deleteSubject'])->name('deletesubject');
    Route::get('/searchstudent',[SubjectListController::class, 'search'])->name('subject.search');

    //reports routes
    Route::get('/reports',[ReportsController::class,'showReports'])->name('reportsview');
    Route::get('addreportspage', [ReportsController::class, 'addReportpage'])->name('addreportpage');
    Route::post('addreportpost', [ReportsController::class, 'addReport'])->name('addreport');
    Route::delete('/deletereport/{id}', [ReportsController::class, 'deleteReport'])->name('deletereport');
    Route::get('/editreports/{id}', [ReportsController::class, 'editReportpage'])->name('editreportpage');
    Route::put('/update/{id}', [ReportsController::class, 'editReport'])->name('editreport');

    //room routes
    Route::get('/roomlist', [RoomController::class, 'showRoom'])->name('showroom');
    Route::get('/addroom', [RoomController::class, 'addRoompage'])->name('addroompage');
    Route::post('/addroompost', [RoomController::class, 'addRoomPost'])->name('addroompost');
    Route::delete('/deleteroom/{id}', [RoomController::class, 'deleteRoom'])->name('deleteroom');
    Route::get('/editroom/{id}',[RoomController::class, 'editRoompage'])->name('editroompage');
    Route::put('/updateroom/{id}', [RoomController::class, 'updateRoom'])->name('updateroom');

    //schedule routes
    Route::get('/schedule', [CalendarEventController::class, 'showSchedulenav'])->name('scheduleviewnav');
    Route::get('/getevent', [CalendarEventController::class, 'getEvent'])->name('getevent');
    Route::post('/createevent', [CalendarEventController::class, 'createEvent'])->name('createevent');
    Route::post('/deleteevent', [CalendarEventController::class, 'deleteEvent'])->name('deleteevent');


    // Route::get('/schedule/teacher/{teacherID}',[ScheduleController::class,'showSchedule'])->name('scheduleview');
    //teacher schedule routes
    Route::get('/schedule/teacher',[ScheduleController::class,'showTeacherSchedule'])->name('teacherscheduleview');
    Route::get('/schedule/teacheradd/', [ScheduleController::class, 'addTeacherSchedulepage'])->name('addteacherschedule');
    Route::post('/schedule/teacherpost/',[ScheduleController::class, 'addTeacherSchedulePost'])->name('addteacherschedulepost');
    Route::delete('/delete/teacher/{id}', [ScheduleController::class, 'deleteTeacherSchedule'])->name('deletesteacherchedule');
    Route::get('/schedule/teacher/{teacherID}',[ScheduleController::class,'showSchedule'])->name('teacherscheduleview');
    Route::get('/edit-teacher-schedule/{id}/{teacherID}', [ScheduleController::class, 'viewEditTeacherSched'])->name('vieweditteachersched');
    Route::post('/update-teacher-schedule/{id}', [ScheduleController::class, 'updateTeacherSchedPost'])->name('updateteacherschedpost');
    // Route::post('/store-selected-teacher', 'ScheduleController@storeSelectedTeacher')->name('storeSelectedTeacher');

    //student schedule routes

    Route::get('/schedule/student/{BatchId}/{BlockId}',[ScheduleController::class,'showStudentSchedule'])->name('studentscheduleview');
    Route::get('/schedule/student/addSchedule/{BatchId}/{BlockId}',[ScheduleController::class,'addStudentSchedule'])->name('addStudentSchedule');
    // addScheduleSave
    Route::post('/schedule/student/addScheduleSave/{BatchId}/{BlockId}',[ScheduleController::class,'addScheduleSave'])->name('addScheduleSave');
  
});
