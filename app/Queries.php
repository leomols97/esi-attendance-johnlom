<?php

namespace App;

use \Illuminate\Support\Facades\DB;

class Queries {

    static public function insertGroupsForStudents($data) {
        DB::table('student_groups')->insert($data);
    }

}
