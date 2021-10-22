<?php

namespace App\Http\Controllers;

use App\GroupsCSV;
use App\Queries;

class GroupsCSVController extends Controller
{
    public function insertGroups(){
        $csv_data = GroupsCSV::csvToArray();
        Queries::insertGroupsForStudents(array_slice($csv_data, 1)); //don't save header line
        print("ok");
    }
}
