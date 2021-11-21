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

    public function showingStudentToCourses()
    {
        $students = AddStudentToCourseModel::findAllStudents();
        $courses = AddStudentToCourseModel::findAllCourses();
        return view('student', ['students' => $students, 'courses' => $courses]);
    }

    public function addStudentToCourse()
    {
        $courseId = $_REQUEST["course_id"];
        $studentId = $_REQUEST["student_id"];
        AddStudentToCourseModel::addAndUpdateStudentToCourse($courseId, $studentId, true);
        return $this->showingStudentToCourses();
    }
}
