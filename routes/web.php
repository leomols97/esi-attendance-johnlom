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

Route::get('/addStudent', [ExceptionController::class, 'add']);
// The route to show the possible students to add to the possible courses
Route::get('/addStudentToCourse', [ExceptionController::class, 'showingStudentToCourses']);
// The route to the page that adds a student to the course into the table "exception_student_list"
Route::post('/addStudentToCourse/add', [ExceptionController::class, 'addStudentToCourse'])->name('add');


