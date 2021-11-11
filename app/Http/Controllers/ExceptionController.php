<?php

namespace App\Http\Controllers;

use App\ExceptionStudentList;
use App\Queries;
use App\Models\AddStudentToCourse;

class ExceptionController extends Controller
{
    public function add()
    {
        Queries::addStudent(ExceptionStudentList::newStudent());
    }

    public function addStudentToCourse()
    {
        AddStudentToCourse::addStudentToCourse(1, 1, true);
        return view("student");
    }
}
