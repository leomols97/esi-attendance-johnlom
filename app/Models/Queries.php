<?php

namespace App\Models;

use \Illuminate\Support\Facades\DB;

class Queries
{

    public $seance_id;

    public function __construct($seance_id)
    {
        $this->seance_id = $seance_id;
    }

    static public function studentsForSeance($seance_id)
    {
        $students = DB::select("SELECT DISTINCT students.id, students.first_name, students.last_name
                                FROM students
                                JOIN student_groups ON students.id = student_groups.student_id
                                JOIN courses_groups ON student_groups.group_name = courses_groups.group_id
                                JOIN courses ON courses_groups.course_id = courses.id
                                JOIN seances ON courses.id = seances.course_id
                                WHERE seances.id = ?", [$seance_id]);
        return $students;
    }

}
