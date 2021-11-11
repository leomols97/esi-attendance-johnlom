<?php

namespace App;

class ExceptionStudentList
{
    public static function newStudent(): array
    {
        $student = [];
        $student["course_id"] = 1;
        $student["student_id"] = 0;
        $student["add"] = 0;
        return $student;
    }
}
