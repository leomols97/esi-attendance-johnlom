<?php

namespace App\Http\Controllers;

use App\GroupsCSV;
use App\Queries;

class GroupsCSVController extends Controller
{
    public function insertGroups(){
        /** 
          * Problème de performance : 10 secondes pour 900~1000 entrées
          * Probablement dû à l'insert des paires une à une
          * TODO : insérer toutes les paires d'un coup pour limiter le nombre d'appels
          **/
        $csv_data = GroupsCSV::csvToArray();
        $count = count($csv_data);
        foreach(array_slice($csv_data, 1) as $data) {
            Queries::insertGroupsForStudents($data);
        }
    }
}
