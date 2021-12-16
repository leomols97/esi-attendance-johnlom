<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Teacher
{
    /**
     * Gets information about a precise teacher.
     */
    public static function getTeacher($teacherId) 
    {
        return DB::table('teachers')->where('acronym','=',$teacherId)->get();
    }
}
