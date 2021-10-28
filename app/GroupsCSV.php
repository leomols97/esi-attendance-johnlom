<?php

namespace App;

use Exception;

class GroupsCSV {

    /**
     * Transforme un fichier CSV qui décrit les affectations de groupe pour chaque étudiant
     * en un tableau.
     */
    public static function csvToArray($file) {
        $studentsArray = [];
        if (($handle = fopen($file, "r")) !== FALSE) {
            try {
                $data = fgetcsv($handle);
                while (($data = fgetcsv($handle)) !== FALSE) {
                    $array = [];
                    $array["student_id"] = $data[0];
<<<<<<< HEAD
                    $array["group_id"] = $data[1];
=======
                    $array["group_name"] = $data[1];
>>>>>>> 78863c82a5fe29e00cf8469eeb8748b9e81cd03e
                    array_push($studentsArray, $array);
                }
                fclose($handle);
            } catch(Exception $ex) {
                throw new Exception("Le fichier fourni n'est pas un fichier CSV correct");
            }
            if(empty($studentsArray)) {
                throw new Exception("Le fichier fourni n'est pas un fichier CSV correct");
            }
        }
        return $studentsArray;
    }
    
}
