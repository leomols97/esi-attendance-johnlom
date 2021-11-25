<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ExceptionController;


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

// The route to show the possible students to add to the possible courses
Route::get('/addOrDeleteStudentFromCourse', [ExceptionController::class, 'showingStudentAndCourses']);
// The route to the page that ADDS a student to a course into the table "exception_student_list"
Route::post('/addOrDeleteStudentFromCourse/add', [ExceptionController::class, 'addStudentToCourse'])->name('add');
// The route to the page that DELETES a student from a course into the table "exception_student_list"
Route::post('/addOrDeleteStudentFromCourse/delete', [ExceptionController::class, 'DeleteStudentFromCourse'])->name('delete');


