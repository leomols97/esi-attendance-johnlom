<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Queries
{
    public static function addStudent($student){
        DB::table('exception_student_list')->insert($student);
    }

    public static function removeStudent($student){
        DB::table('exception_student_list')->delete($student);
    }

    public static function allCourses(){
        DB::table('courses')->get();
    }
}
