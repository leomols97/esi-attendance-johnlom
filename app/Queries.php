<?php

namespace App;

use \Illuminate\Support\Facades\DB;

/**
 * Handles interactions with the database.
 */
class Queries {

    /**
     * Inserts into the database the group assignment for each student.
     * Beforehand, clears the stored assignments to avoid conflict and keeping outdated information.
     */
    static public function insertGroupsForStudents($data) {
        DB::table('student_groups')->delete();
        DB::table('student_groups')->insert($data);
    }

    /**
     * Gets attendance details. 
     */
    static public function findPresences()
    {
        $presences = DB::select('
            SELECT p.student_id, s.start_time, s.end_time, s.local, cg.course_id, p.is_present
                FROM presences p
                    JOIN seances s ON p.seance_id = s.id
                    JOIN courses_groups cg ON s.course_group = cg.course_id
                ORDER BY s.start_time, p.student_id
        ');
        return $presences;
    }

}
