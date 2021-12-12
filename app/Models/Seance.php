<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seance extends Model {

    public static function getSeances() {
        return DB::select("SELECT s.id, c.name as title, s.start_time as start, s.end_time as end
        FROM seances s
        JOIN courses_groups cg ON s.course_group = cg.id
        JOIN courses c ON cg.course_id = c.id");
    }

}