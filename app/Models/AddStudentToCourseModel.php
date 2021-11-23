<?php

/**
 * The queries model to add an exisiting student to an existing course
 *
 * @copyright  53212 (MOLS Léopold) && 53135 (SCHUMACHER VINCKE Jan)
 * @link       https://git.esi-bru.be/prjg5-2021-22/esi-attendance-johnlom
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class AddStudentToCourseModel extends Model
{
    use HasFactory;

    /**
     * Finds all students in the table "students"
     *
     * @return void
     */
    static public function findAllStudents()
    {
        $students = DB::select('
            SELECT id, last_name, first_name
            FROM students
            ORDER BY id ASC
        ');
        return $students;
    }

    /**
     * Finds all courses in the table "courses"
     *
     * @return void
     */
    static public function findAllCourses()
    {
        $students = DB::select('
            SELECT id, name, teacher_id
            FROM courses
            ORDER BY id ASC
        ');
        return $students;
    }

    /**
     * Selects a student
     *
     * @param  integer $id  The id of the student to select
     *
     * @return void
     */
    static public function selectStudentInCourse($course_id, $student_id) : boolean
    {
        return DB::table('students')->select('id')->where('id', '=', $id)->get() != null;
    }

    /**
     * Adds a student to a course
     *
     * @param  integer $course_id     The id of the course to add the student to
     * @param  integer $student_id    The id of the student to add to a course
     * @param  boolean $add           The status of the adding
     *
     * @throws QueryException if the query could not be executed
     *
     * @return void
     */
    static public function addStudentToCourse($course_id, $student_id, $add)
    {
        // Sélectionne le tuple dont l'étudiant et le cours sont donnés en paramètres
        // pour voir s'il existe ou non
        $student = DB::select(
            'SELECT course_id, student_id
            FROM exception_student_list
            WHERE course_id = ? AND student_id = ?
            ',
            [$course_id, $student_id]
        );
        try {
            // Insère l'étudiant ton les paramètres sont reçus en paramètres
            if (empty($student))
            {
                DB::insert(
                    'INSERT INTO exception_student_list
                        (`course_id`, `student_id`, `add`)
                        values
                        (?, ?, ?)
                    ',
                    [$course_id, $student_id, $add]
                );
            } else {
                echo "<script>alert(\"L'étudiant a déjà été ajouté à ce cours\")</script>";
            }
        } catch (QueryException $exception) {
            echo "There's no such student or course !";
            throw $exception;
        }
    }

    /**
     * Adds or updates a student to a course belonging the course_id and the student_id
     *
     * @param  integer $course_id     The id of the course to add the student to
     * @param  integer $student_id    The id of the student to add to a course
     * @param  boolean $add           The status of the adding
     *
     * @throws QueryException if the query could not be executed
     *
     * @return void
     */
    static public function addAndUpdateStudentToCourse($course_id, $student_id, $add)
    {
        // Sélectionne le tuple dont l'étudiant et le cours sont donnés en paramètres
        // pour voir s'il existe ou non
        $student = DB::select(
            'SELECT course_id, student_id
            FROM exception_student_list
            WHERE course_id = ? AND student_id = ?
            ',
            [$course_id, $student_id]
        );
        try {

            // Insère l'étudiant ton les paramètres sont reçus en paramètres
            if (empty($student))
            {
                DB::table('exception_student_list')->updateOrInsert([
                    'course_id' => $course_id,
                    'student_id' => $student_id,
                ], ['add' => $add]);
            } else {
                echo "<script>alert(\"L'étudiant a déjà été ajouté à ce cours\")</script>";
            }
        } catch (QueryException $exception) {
            throw $exception;
        }
    }

    /**
     * Selects a student
     *
     * @param  integer $id  The id of the student to select
     *
     * @return void
     */
    static public function selectStudent($id)
    {
        return DB::table('students')
                ->select('id')
                ->where('id', '=', $id)
                ->get();
    }

    /**
     * Selects a course
     *
     * @param  integer $id  The id of the course to select
     *
     * @return void
     */
    static public function selectCourse($id)
    {
        return DB::select('select id from courses where id = ?', [$id]);
    }

    /**
     * Removes a student from the table "exception_student_list"
     *
     * @param  integer $student     The id of the student to add to the table
     *
     * @return void
     */
    public static function removeStudent($student)
    {
        DB::table('exception_student_list')
            ->delete($student);
    }

    /**
     * Selects all the elements from the table 'exception_student_list'
     *
     * @return all the elements of the table
     */
    public static function selectAllExceptions()
    {
        return DB::table('exception_student_list')->get();
    }
}
