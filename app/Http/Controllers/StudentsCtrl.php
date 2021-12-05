<?php

namespace App\Http\Controllers;

use App\Queries;
use App\Models\Student;
use App\Models\PresenceFormatter;
use Illuminate\Http\Request;
use Throwable;
use Exception;

class StudentsCtrl extends Controller {

    function getStudents( $seance_id ) {
        $result = Queries::studentsForSeance( $seance_id );
        return response()->json( $result );
    }

    function students( $seance_id ) {
        $students = Queries::studentsForSeance( $seance_id );
        return view( 'studentsConsultation', compact( 'students' ), ['seance_id' => $seance_id] );
    }

    function savePresences( Request $request, $seance_id ) {
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

    function getIndex() {
        return view( 'addStudent' );
    }

    function add( Request $request ) {
        try {
            if ( isset( $request->id )
            && isset( $request->last_name )
            && isset( $request->first_name ) ) {
                if ( $request->id > 10000
                && $request->id < 100000 ) {
                    if ( empty( Student::selectStudent( $request->id ) ) ) {
                        $id = $request->id;
                        $last_name = $request->last_name;
                        $first_name = $request->first_name;
                        Student::add( $id, $last_name, $first_name );
                        return redirect()->back()->withSuccess( 'Ajouté(e) !' );
                    } else {
                        return redirect()->back()->withErrors( "Impossible d'ajouter un étudiant dont le matricule a déjà été attribué à un autre étudiant !" );
                    }
                } else {
                    return redirect()->back()->withErrors( "Pour l'ajout, le matricule de l'étudiant doit être compris entre 10000 et 100000 !" );
                }
            } else {
                return redirect()->back()->withErrors( "Pour l'ajout, veuillez remplir chaque champ pour l'ajout ! $resu" );
            }
        } catch ( Throwable $e ) {
            return redirect()->back()->withErrors( "L'étudiant(e) n'a malheureusement pas pu être ajouté(e) !" );
        }
    }

    function getAll() {
        $students = Student::findAllStudents();

        return view( 'studentsManagement', compact( 'students' ) );
    }

    function delete( $id ) {
        try {
            Student::deleteStudent( $id );
            return redirect()->back()->withSuccess( 'Etudiant supprimé!' );
        } catch( Throwable $e ) {
            return redirect()->back()->withErrors( "Erreur, l'étudiant(e) n'a malheureusement pas pu être supprimé!" );
        }
    }
}
