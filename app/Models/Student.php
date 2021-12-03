<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    public static function add($id,$last,$first) {
        DB::insert('insert into students (id, last_name, first_name) values (?, ?,?)', [$id, $last, $first]);
    }

    /**
     * Finds all students in the table "students"
     *
     * @return ResultSet
     */
    public static function findAllStudents()
    {
        $students = DB::select('
            SELECT id, last_name, first_name
            FROM students
            ORDER BY id ASC
        ');
        return $students;
    }

    /**
     * Delete a student from the database
     * @return void
     */
    public static function deleteStudent($id)
    {
        DB::table('students')->where('id', '=',$id)->delete();
    }

}
