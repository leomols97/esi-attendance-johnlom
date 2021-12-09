<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Seance {

    /**
     * Gets all students who don't attend at a given course.
     */
    static public function getStudentsNotInSeance($seanceId) 
    {
        $students = DB::select("SELECT *
                                    FROM students
                                    WHERE id NOT IN (
                                        SELECT st.id
                                            FROM seances s
                                                JOIN courses_groups cg ON s.course_group = cg.id
                                                JOIN student_groups sg ON cg.group_id = sg.group_name
                                                JOIN students st ON sg.student_id = st.id
                                            WHERE s.id = ?
                                        UNION
                                        SELECT st.id
                                            FROM seances s
                                                JOIN courses_groups cg ON s.course_group = cg.id
                                                JOIN exception_student_list esl ON cg.course_id = esl.course_id
                                                JOIN students st ON esl.student_id = st.id
                                            WHERE s.id = ?)", [$seanceId, $seanceId]);
        return $students;
    }
    
}