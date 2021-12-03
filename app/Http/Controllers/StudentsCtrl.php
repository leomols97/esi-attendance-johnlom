<?php

namespace App\Http\Controllers;

use App\Queries;

class StudentsCtrl extends Controller
{

    function getStudents($seance_id)
    {
        $result = Queries::studentsForSeance($seance_id);
        return response()->json($result);
    }

    function students($seance_id)
    {
        echo '<script>alert(\'Veuillez remplir chaque champ pour l\'ajout !\' )</script>';
        $students = Queries::studentsForSeance($seance_id);
        return view('studentsConsultation', compact('students'));
    }

}
