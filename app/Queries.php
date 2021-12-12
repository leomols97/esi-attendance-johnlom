<?php

namespace App;

use \Illuminate\Support\Facades\DB;

/**
 * Handles interactions with the database.
 */
class Queries
{

    public $seance_id;

    public function __construct($seance_id)
    {
        $this->seance_id = $seance_id;
    }

    /**
     * Gets all students who attend at a given seance.
     */
    static public function studentsForSeance($seance_id)
    {
        $students = DB::select("SELECT s.*
                                    FROM students s
                                        JOIN student_groups sg ON s.id = sg.student_id
                                        JOIN courses_groups cg ON sg.group_name = cg.group_id
                                        JOIN seances se ON cg.id = se.course_group
                                    WHERE se.id = ? AND s.id NOT IN (SELECT esl.student_id
                                                                        FROM seances se
                                                                            JOIN courses_groups cg ON se.course_group = cg.id
                                                                            JOIN exception_student_list esl ON cg.course_id = esl.course_id
                                                                        WHERE se.id = ? AND esl.add = 0)
                                UNION
                                -- plus exceptions
                                SELECT s.*
                                    FROM seances se
                                        JOIN courses_groups cg ON se.course_group = cg.id
                                        JOIN exception_student_list esl ON cg.course_id = esl.course_id
                                        JOIN students s ON esl.student_id = s.id
                                    WHERE se.id = ? AND esl.add = 1", [$seance_id, $seance_id]);
        return $students;

        /*TODO: Modifier cette requete car elle ne prend pas en compte les utilisateurs retiré d'un cours.
            Ex: les utilisateurs dans les exceptions avec flase sont affiché. */
    }

    /**
     * Inserts into the database the group assignment for each student.
     * Beforehand, clears the stored assignments to avoid conflict and keeping outdated information.
     */
    static public function insertGroupsForStudents($data)
    {
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
        foreach ($presences as $presence) {
            DB::table('presences')->updateOrInsert(
                ["seance_id" => $presence["seance_id"], "student_id" => $presence["student_id"]],
                ["is_present" => $presence["is_present"]]
            );
        }
    }

}
