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

    public function show()
    {
        $courses = Queries::allCourses();
        return view('student', ['courses' => $courses]);
    }


    // Léopold Mols from here
    static function selectStudent($id)
    {
        return AddStudentToCourseModel::selectStudent($id);
    }

    static function selectCourse($id)
    {
        return AddStudentToCourseModel::selectCourse($id);
    }

    static function existingStudent($id)
    {
        var_dump($id);
        var_dump(ExceptionController::selectStudent($id));
        return $id == ExceptionController::selectStudent($id);
    }

    static function existingCourse($id)
    {
        var_dump($id);
        var_dump(ExceptionController::selectCourse($id));
        return $id == ExceptionController::selectCourse($id);
    }

    public function addStudentToCourse()
    {
        $array = [];
        if (isset($_REQUEST["course_id"])
            && isset($_REQUEST["student_id"])
            && ExceptionController::existingStudent($_REQUEST["student_id"])
            /*&& ExceptionController::existingCourse($_REQUEST["course_id"])*/)
        {
            $courseId = $_REQUEST["course_id"];
            $studentId = $_REQUEST["student_id"];
            $inserted = AddStudentToCourseModel::addStudentToCourse($courseId, $studentId, true);
            $array = ["inserted" => $inserted];
        }
        else
        {
            $inserted = false;
            $array = ["inserted" => $inserted];
        }
        $students = $array;
        $students_json = json_encode($students);
        return view("student");
    }
}
