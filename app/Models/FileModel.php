<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class FileModel extends Model
{
    use HasFactory;

    static public function findPresences()
    {
        $presences = DB::select('
            SELECT p.student_id, s.start_time, s.end_time, s.room, s.course_ue, p.is_present
            FROM presences p
            JOIN seances s ON p.seance_id = s.id
            ORDER BY s.start_time ASC
        ');
        return $presences;
    }
}
