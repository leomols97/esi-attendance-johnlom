<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Course
{
    public static function studentsNotInCourse($seanceId)
    {
        return DB::select("SELECT *
                                    FROM students
                                    WHERE id NOT IN
                                          (SELECT sg.student_id
                                            FROM courses c
                                                JOIN courses_groups cg ON c.id = cg.course_id
                                                JOIN student_groups sg ON cg.group_id = sg.group_name
                                            WHERE c.id = ?
                                            UNION
                                            SELECT esl.student_id
                                                FROM exception_student_list esl
                                                WHERE esl.course_id = ?)", [$seanceId, $seanceId]);
    }
}
