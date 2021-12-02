<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Seance;


class CalendarCtrl extends Controller
{

    public function calendarData(Request $request)
    {
        if($request->ajax()) {
            return response()->json(Seance::getSeances()); 
        }
        return view('calendar');
    }

}
