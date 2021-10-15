<?php
namespace App\Models;
use \Illuminate\Support\Facades\DB;
    class Queries {

        static public function studentsForSeance($seance_id) {
            $students = DB::select("SELECT st.id, st.first_name, st.last_name
                                        FROM seance_groups se_g
                                            JOIN student_groups st_g ON se_g.group_id = st_g.group_id
                                            JOIN students st ON st_g.student_id = st.id
                                        WHERE se_g.seance_id = ?;");
            return $students;
        }

    }