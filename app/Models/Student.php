<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Student
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

}
