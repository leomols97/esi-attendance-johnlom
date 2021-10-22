<?php

namespace App;

class GroupsCSV {

    public static function csvToArray() {
        $studentsArray = [];
        if (($handle = fopen("Students.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle)) !== FALSE) {
                array_push($studentsArray, $data);
            }
            fclose($handle);
        }
        return $studentsArray;
    }
    
}
