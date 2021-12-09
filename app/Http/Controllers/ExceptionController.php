<?php

/**
* The controler to add an exisiting student to an existing course
*
* @link       https://git.esi-bru.be/prjg5-2021-22/esi-attendance-johnlom
*/

// namespace App\Exceptions;
namespace App\Http\Controllers;

use App\ExceptionStudentList;
use App\Queries;
use App\Models\StudentModel;
use Illuminate\Database\QueryException;
use App\Exceptions;

// use Exception;

class ExceptionController extends Controller {

    /**
    * Sends the students and the courses available to the view that has to show them
    *
    * @return void
    */
    public function showingStudentAndCourses() {
        $students = StudentModel::findAllStudents();
        $courses = StudentModel::findAllCourses();
        return view( 'addOrDeleteStudentFromCourse', ['students' => $students, 'courses' => $courses] );
    }

    /**
     * Sends the students and the courses available to the view that has to show them
     *
     * @return addStudentToCourse   The view to load the original page and give to it all the students and courses
     */
    public function showingStudentToCourses()
    {
        $students = AddStudentToCourseModel::findAllStudents();
        $courses = AddStudentToCourseModel::findAllCourses();
        return view('addStudentToCourse', ['students' => $students, 'courses' => $courses]);
    }

    /**
    * Adds a student to a course and puts it into the table 'exception_student_list'
    *
    * @return void
    */

    public function addStudentToCourse() {
        if ( isset( $_REQUEST['course_id'] )
        && isset( $_REQUEST['student_id'] ) ) {
            $courseId = $_REQUEST['course_id'];
            $studentId = $_REQUEST['student_id'];
            try {
                StudentModel::addAndUpdateStudentToCourse( $courseId, $studentId, true );
            } catch ( \Exception $exception ) {
                echo $exception->getmessage();
            }
        } else {
            echo '<script>alert(\'Veuillez remplir chaque champ pour l\'ajout !\' )</script>';
        }
        return $this->showingStudentAndCourses();
    }

    /**
     * Deletes a student to a course and puts it into the table 'exception_student_list'
    *
    * @return void
    */
    public function DeleteStudentFromCourse() {
        if ( isset( $_REQUEST['course_id'] )
            && isset( $_REQUEST['student_id'] ) )
        {
            $courseId = $_REQUEST['course_id'];
            $studentId = $_REQUEST['student_id'];
            try {
                StudentModel::DeleteStudentFromCourse( $courseId, $studentId );
            } catch (\Exception $exception) {
                echo $exception->getmessage();
            }
        } else {
                echo '<script>alert( \'Veuillez remplir chaque champ pour la suppression !\' )</script>';
        }
        return $this->showingStudentAndCourses();
    }
}
