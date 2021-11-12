<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class AddStudentToCourseModel extends Model
{
    use HasFactory;

    static public function findAll()
    {
        //test2 heroku connection refused
        $students = DB::select('
            SELECT id, last_name, first_name
            FROM students
            ORDER BY id ASC
        ');
        return $students;
    }

    static public function addStudentToCourse($course_id, $student_id, $add)
    {
        try {
            DB::insert(
                'INSERT INTO exception_student_list
                    (`course_id`, `student_id`, `add`)
                    values
                    (?, ?, ?)
                ',
                [$course_id, $student_id, $add]
            );
        } catch (QueryException $exception) {
            echo "There's no such student !";
            echo $exception;
        }
    }

    static public function selectStudent($id)
    {
        $student = DB::select('select * from students where id = ?', [$id]);
        return $student;
    }
}
