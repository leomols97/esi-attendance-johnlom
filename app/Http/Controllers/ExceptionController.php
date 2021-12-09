<?php

/**
 * The controler to add an exisiting student to an existing course
 *
 * @copyright  53212 (MOLS Léopold) && 53135 (SCHUMACHER VINCKE Jan)
 * @link       https://git.esi-bru.be/prjg5-2021-22/esi-attendance-johnlom
 */

namespace App\Http\Controllers;

use App\ExceptionStudentList;
use App\Models\Course;
use App\Queries;
use App\Models\AddStudentToCourseModel;
use Illuminate\Database\QueryException;

class ExceptionController extends Controller
{
    /**
     * Sends the students and the courses available to the view that has to show them
     *
     * @return void
     */
    public function showingStudentToCourses($seance_id)
    {
        $students = Course::studentsNotInCourse($seance_id);
        return view('addStudentToCourse', ['students' => $students, 'seance_id' => $seance_id]);
    }

    /**
     * Adds a student to a course and puts it into the table "exception_student_list"
     *
     * @return void
     */
    public function addStudentToCourse($seance_id)
    {
        $courseId = $_REQUEST["course_id"];
        $studentId = $_REQUEST["student_id"];
        AddStudentToCourseModel::addAndUpdateStudentToCourse($courseId, $studentId, true);
        return $this->showingStudentToCourses();
    }
}
