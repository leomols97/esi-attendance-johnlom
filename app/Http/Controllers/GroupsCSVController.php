<?php

namespace App\Http\Controllers;

use App\GroupsCSV;

class GroupsCSVController extends Controller
{
    public function show(){
        $array = GroupsCSV::csvToArray();
        print_r($array);
    }
}
