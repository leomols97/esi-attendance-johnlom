<?php

namespace App;

class ExceptionStudentList
{
    public static function newStudent(): array
    {
        $student = [];
        $student["course_id"] = 12;
        $student["student_id"] = 53135;
        $student["add"] = 0;
        return $student;
    }
}
