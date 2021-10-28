<?php

namespace App\Http\Controllers;

use App\ExceptionStudentList;
use App\Queries;

class ExceptionController extends Controller
{
    public function add(){
        Queries::addStudent(ExceptionStudentList::newStudent());
    }
}
