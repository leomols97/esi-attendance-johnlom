<?php

namespace App\Http\Controllers;

use App\Queries;
use App\Models\Student;
use App\Models\PresenceFormatter;
use App\Models\Group;
use Illuminate\Http\Request;
use Throwable;
use Exception;


class StudentsCtrl extends Controller
{
    function getStudents($seance_id)
    {
        $result = Queries::studentsForSeance($seance_id);
        return response()->json($result);
    }

    /**
    * Method to get student for a specific session.
    *
    * @param $seance_id                The id of the seance
    *
    * @return studentsConsultation     The view to show with the id of the seance
    */

    function students( $seance_id ) {
        $students = Queries::studentsForSeance( $seance_id );
        return view( 'take_presences', compact( 'students' ), ['seance_id' => $seance_id] );
    }

    /**
    * Method to save presences for a specific session
    *
    * @param Request $request      The request received from the view
    * @param $seance_id            The id of the seance to save the presences of
    *
    * @return presence_validation  The view to show and to give the result of the saving to
    */

    function save_presences( Request $request, $seance_id ) {
        $checkboxes = $request->checklist;
        $present_student_ids = $checkboxes != NULL ? array_keys( $checkboxes ) : array();
        try {
            $presences = PresenceFormatter::savePresences( $present_student_ids, $seance_id );
            Queries::insertPresences( $presences );
        } catch( Exception $ex ) {
            return view( 'presence_validation', ['success' => false] );
        }
        return view( 'presence_validation', ['success' => true] );
    }

    /**
    * Adds a student to a course and puts it into the table 'exception_student_list'
    *
    * @param Request $request   The request received from the view
    *
    * @return message           A message to show if the creation went well or not
    */

    function add( Request $request ) {
        try {
            // Checks if every field is set to something
            if ( isset( $request->id )
            && isset( $request->last_name )
            && isset( $request->first_name )
            && isset( $_POST['group'] ) ) {
                // Checks if the id of the student to add is between 10.000 and 100.000
                if ( $request->id > 10000
                && $request->id < 100000 ) {
                    // Checks if there's any existing student with this id in the DB yet
                    if ( empty( Student::selectStudent( $request->id ) ) ) {
                        $id = $request->id;
                        $last_name = $request->last_name;
                        $first_name = $request->first_name;
                        $group = $_POST['group'];
                        Student::add( $id, $last_name, $first_name, $group );
                        return redirect()->back()->withSuccess( 'Ajouté(e) !' );
                    } else {
                        return redirect()->back()->withErrors( "Impossible d'ajouter un étudiant dont le matricule a déjà été attribué à un autre étudiant !" );
                    }
                } else {
                    return redirect()->back()->withErrors( "Pour l'ajout, le matricule de l'étudiant doit être compris entre 10000 et 100000 !" );
                }
            } else {
                return redirect()->back()->withErrors( "Pour l'ajout, veuillez remplir chaque champ pour l'ajout !" );
            }
        } catch ( Throwable $e ) {
            return redirect()->back()->withErrors( "L'étudiant(e) n'a malheureusement pas pu être ajouté(e) !" );
        }
    }

     /**
    * Method to get all students and groups of the database.
    *
    * @return studentsManagement    The view to show with the param 'students' and 'groups'
    */
    function getAll()
    {
        $students = Student::findAllStudents();
        $groups = Group::findAllGroups();
        return view( 'students_management', compact( 'students' ), compact( 'groups' ) );
    }
    
    /**
    * Method to delete a student with his id.
    *
    * @return message   The message to show when the deletion processed
    */
    function delete($id)
    {
        try{
            Student::deleteStudent($id);
            return redirect()->back()->withSuccess('Etudiant supprimé!');
        }catch(Throwable $e){
            return redirect()->back()->withErrors("Erreur, l'étudiant(e) n'a malheureusement pas pu être ajouté(e)!");
        }
    }
    
}
