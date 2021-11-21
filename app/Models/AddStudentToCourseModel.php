<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class AddStudentToCourseModel extends Model
{
    use HasFactory;

    static public function findAllStudents()
    {
        $students = DB::select('
            SELECT id, last_name, first_name
            FROM students
            ORDER BY id ASC
        ');
        return $students;
    }

    static public function findAllCourses()
    {
        $students = DB::select('
            SELECT id, name, teacher_id
            FROM courses
            ORDER BY id ASC
        ');
        return $students;
    }

    static public function addAndUpdateStudentToCourse($course_id, $student_id, $add)
    {
        try {
            DB::table('exception_student_list')->updateOrInsert([
                'course_id' => $course_id,
                'student_id' => $student_id,
            ], ['add' => $add]);
        } catch (QueryException $exception) {
            echo "There's no such student !";
            echo $exception;
        }
    }

    static public function selectStudent($id)
    {
        //return DB::select('select id from students where id = ?', [$id]);
        return DB::table('students')->select('id')->where('id', '=', $id)->get();
    }

    static public function selectCourse($id)
    {
        return DB::select('select id from courses where id = ?', [$id]);
    }

    public static function selectAllExceptions()
    {
        return DB::table('exception_student_list')->get();
    }
}
