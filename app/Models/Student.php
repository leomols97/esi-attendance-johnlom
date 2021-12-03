<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    public $id;
    public $last_name;
    public $first_name;

    public function __construct($id, $last_name, $first_name)
    {
        $this->id = $id;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
    }

    public static function add(Student $student) {
        $id = $student->id;
        $last = $student->last_name;
        $first = $student->first_name;
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
