<?php

namespace App\Http\Controllers;

use App\Queries;
use App\Models\Student;
use Illuminate\Http\Request;
use Throwable;
use App\Models\PresenceFormatter;
use Exception;

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
        return view('studentsConsultation', compact('students'), ["seance_id" => $seance_id]);
    }

    function save_presences(Request $request, $seance_id)
    {
        $checkboxes = $request->checklist;
        $present_student_ids = $checkboxes != NULL ? array_keys($checkboxes) : array();
        try {
            $presences = PresenceFormatter::savePresences($present_student_ids, $seance_id);
            Queries::insertPresences($presences);
        } catch(Exception $ex) {
            return view('presence_validation', ["success" => false]);
        }
        return view('presence_validation', ["success" => true]);
    }

    function getIndex() {
        return view('addStudent');
    }

    function add(Request $request) {
        try {
            //$student = new Student($request->id,$request->last_name,$request->first_name);
            $id = $request->id;
            $last_name = $request->last_name;
            $first_name = $request->first_name;
            Student::add($id, $last_name, $first_name);
            return redirect()->back()->withSuccess('Ajouté(e) !');
        } catch (Throwable $e) {
            return redirect()->back()->withErrors("L'étudiant(e) n'a malheureusement pas pu être ajouté(e) !");
        }
    }

    function getAll()
    {
        $students = Student::findAllStudents();

        return view('studentsManagement', compact('students'));
    }

    function delete($id)
    {
        try{
            Student::deleteStudent($id); 
            return redirect()->back()->withSuccess('Etudiant supprimé!');
        }catch(Throwable $e){
            return redirect()->back()->withErrors("Erreur, l'étudiant(e) n'a malheureusement pas pu être supprimé!");
        }
    }
}
