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
Route::get('/addStudentToCourse', [ExceptionController::class, 'addStudentToCourse']);
Route::post('/addStudentToCourse/add', [ExceptionController::class, 'addStudentToCourse'])->name('add');


