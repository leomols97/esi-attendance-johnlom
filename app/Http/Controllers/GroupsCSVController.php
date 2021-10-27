<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupsCSV;
use App\Queries;
use Exception;

class GroupsCSVController extends Controller
{

    public function interface(){
        return view('studentsgroups', ["error" => false, "success" => false]);
    }

    public function importCsv(Request $request){
        try {
            $csv_file = $request->file('studentsGroupsCSV');
            $csv_data = GroupsCSV::csvToArray($csv_file);
        } catch (Exception $exception) {
            return view('studentsgroups', ["error" => true, "success" => false]);
        }
        Queries::insertGroupsForStudents($csv_data);
        return view('studentsgroups', ["error" => false, "success" => true]);
    }

}
