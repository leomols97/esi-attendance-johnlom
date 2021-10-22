<?php

namespace App;

use \Illuminate\Support\Facades\DB;

class Queries {

    static public function insertGroupsForStudents($data) {
        DB::insert("INSERT INTO student_groups (student_id, group_id) VALUES (?,?)", [$data[0], $data[1]]);
    }

}
