<?php

namespace App\Http\Controllers;

use App\Models\Queries;
use App\Models\Student;
use Illuminate\Http\Request;


class StudentsCtrl extends Controller
{

    function getStudents($seance_id)
    {
        $result = Queries::studentsForSeance($seance_id);
        return response()->json($result);
    }

    function students($seance_id)
    {
        $students = Queries::studentsForSeance($seance_id);
        return view('studentsConsultation', compact('students'));
    }

    function getIndex() {
        return view('addStudent');
    }

    function add(Request $request) {
        $student = new Student($request->id,$request->last_name,$request->first_name);
        Student::add($student);
        return view('addStudent');
    }

    
}
