<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupsCSV;
use App\Queries;
use Exception;

class GroupsCSVController extends Controller
{

    public function interface(){
        return view('studentsgroups', ["error" => False, "success" => False]);
    }

    public function importCsv(Request $request){
        try {
            $csv_file = $request->file('studentsGroupsCSV');
            $csv_data = GroupsCSV::csvToArray($csv_file);
        } catch (Exception $exception) {
            return view('studentsgroups', ["error" => True, "success" => False]);
        }
        Queries::insertGroupsForStudents($csv_data); //don't save header line
        return view('studentsgroups', ["error" => False, "success" => True]);
    }

}
