<?php

namespace App\Http\Controllers;

use App\Models\Session;



class AttendanceController extends Controller
{
    function courses()
    {
        $courses = Session::importICS("JLC_LECHIEN_Jonathan.ics");
        return view('test', compact('courses'));
    }


}
