<?php

namespace App;

class GroupsCSV {

    public static function csvToArray() {
        $studentsArray = [];
        if (($handle = fopen("Students.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle)) !== FALSE) {
                $array = [];
                $array["student_id"] = $data[0];
                $array["group_id"] = $data[1];
                array_push($studentsArray, $array);
            }
            fclose($handle);
        }
        return $studentsArray;
    }
    
}
