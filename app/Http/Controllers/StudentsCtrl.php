<?php

namespace App\Http\Controllers;

use App\Queries;
use App\Models\Student;
use App\Models\Group;
use Illuminate\Http\Request;
use Throwable;
use App\Models\PresenceFormatter;
use Exception;

class StudentsCtrl extends Controller
{

    //Encore utile??
    function getStudents($seance_id)
    {
        $result = Queries::studentsForSeance($seance_id);
        return response()->json($result);
    }

    /**
     * Method to get student for a specific session.
     * 
     * @param $seance_id
     */
    function students($seance_id)
    {
        $students = Queries::studentsForSeance($seance_id);
        return view('studentsConsultation', compact('students'), ["seance_id" => $seance_id]);
    }

    /**
     * Method to save presences for a specific session
     * 
     * @param Request $request
     * @param $seance_id 
     */
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

    /**
     * Method to add a student with a group in the database.
     * 
     * @param Request $request
     */
    function add(Request $request) {
        try {
            $id = $request->id;
            $last_name = $request->last_name;
            $first_name = $request->first_name;
            $group = $_POST["group"];
            Student::add($id, $last_name, $first_name, $group);
            return redirect()->back()->withSuccess('Ajouté(e) !');
        } catch (Throwable $e) {
            return redirect()->back()->withErrors("L'étudiant(e) n'a malheureusement pas pu être ajouté(e) !");
        }
    }

    /**
     * Method to get all students and groups of the database.
     */
    function getAll()
    {
        $students = Student::findAllStudents();
        $groups = Group::findAllGroups();

        return view('studentsManagement', compact('students'), compact('groups'));
    }

    /**
     * Method to delete a student with his id.
     * 
     * @param $id
     */
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
