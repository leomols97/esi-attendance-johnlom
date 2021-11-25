<?php

namespace App;

use \Illuminate\Support\Facades\DB;

/**
 * Handles interactions with the database.
 */
class Queries {

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
            SELECT p.student_id, s.start_time, s.end_time, s.local, s.id, p.is_present
            FROM presences p
            JOIN seances s ON p.seance_id = s.id
            ORDER BY s.start_time, p.student_id
        ');
        return $presences;
    }

    /**
     * Inserts into the database presences records.
     */
    static public function insertPresences($presences)
    {
       foreach($presences as $presence) {
           DB::table('presences')->updateOrInsert(
               ["seance_id" => $presence["seance_id"], "student_id" => $presence["student_id"]],
               ["is_present" => $presence["is_present"]]
           );
       }
    }

}
