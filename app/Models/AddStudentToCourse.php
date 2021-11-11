<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class AddStudentToCourse extends Model
{
    use HasFactory;

    static public function addStudentToCourse($course_id, $student_id, $add)
    {
        try {
            DB::insert(
                // 'INSERT INTO exception_student_list
                //     (`course_id`, `student_id`, `add`)
                //     values
                //     (?, ?, ?)
                // ',
                // [$course_id, $student_id, $add]
                'INSERT INTO exception_student_list
                    (`course_id`, `student_id`, `add`)
                VALUES
                    (3, 0, 0)
                '
            );
        } catch (QueryException $exception) {
            echo "Student existant";
            echo $exception;
        }
    }
}
