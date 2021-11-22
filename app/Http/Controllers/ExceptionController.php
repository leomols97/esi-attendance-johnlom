<?php

/**
 * The controler to add an exisiting student to an existing course
 *
 * @copyright  53212 (MOLS Léopold) && 53135 (SCHUMACHER VINCKE Jan)
 * @link       https://git.esi-bru.be/prjg5-2021-22/esi-attendance-johnlom
 */

namespace App\Http\Controllers;

use App\ExceptionStudentList;
use App\Queries;
use App\Models\AddStudentToCourseModel;

class ExceptionController extends Controller
{
    /**
     * Sends the students and the courses available to the view that has to show them
     *
     * @return void
     */
    public function showingStudentToCourses()
    {
        $students = AddStudentToCourseModel::findAllStudents();
        $courses = AddStudentToCourseModel::findAllCourses();
        return view('student', ['students' => $students, 'courses' => $courses]);
    }

    /**
     * Adds a student to a course and puts it into the table "exception_student_list"
     *
     * @return void
     */
    public function addStudentToCourse()
    {
        $courseId = $_REQUEST["course_id"];
        $studentId = $_REQUEST["student_id"];
        AddStudentToCourseModel::addStudentToCourse($courseId, $studentId, true);
        return $this->showingStudentToCourses();
    }
}
