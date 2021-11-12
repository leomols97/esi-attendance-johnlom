<?php

namespace App\Http\Controllers;

use App\ExceptionStudentList;
use App\Queries;
use App\Models\AddStudentToCourseModel;

class ExceptionController extends Controller
{
    public function add()
    {
        Queries::addStudent(ExceptionStudentList::newStudent());
    }


    // Léopold Mols from here
    static function selectStudent($id)
    {
        return AddStudentToCourseModel::selectStudent($id);
    }

    static function existingStudent($id)
    {
        return $id == ExceptionController::selectStudent($id);
    }

    public function addStudentToCourse()
    {
        AddStudentToCourseModel::addStudentToCourse(1, 1, true);
        $array=[];
        if(isset($_REQUEST["id"])
            && isset($_REQUEST["course_id"])
            && isset($_REQUEST["student_id"])
            && !ExceptionController::existingStudent($_REQUEST["id"]))
        {
            $id = $_REQUEST["id"];
            $last_name = $_REQUEST["last_name"];
            $first_name = $_REQUEST["first_name"];
            $inserted = AddStudentToCourseModel::addStudent($id, $last_name, $first_name);
            $array = ["inserted" => $inserted];
        }
        else
        {
            $inserted = false;
            $array = ["inserted" => $inserted];
        }
        $students = AddStudentToCourseModel::findAll();
        $students_json = json_encode($students);
        return view("student", ["students" => $students_json]);
    }
}
