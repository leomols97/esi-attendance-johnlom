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
        $students = DB::select("SELECT DISTINCT s.*
                                FROM students s
                                JOIN student_groups sg ON s.id = sg.student_id
                                JOIN courses_groups cg ON sg.group_name = cg.group_id
                                JOIN seances se ON cg.id = se.course_group
                                WHERE se.id = ?", [$seance_id]);
        return $students;
    }

}
