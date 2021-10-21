<?php


namespace App\Models;

use Illuminate\Support\Facades\DB;

require_once '../vendor/autoload.php';

use ICal\ICal;

class Session 
{
    private $course;
    private $teacher;
    private $dateBegin;
    private $dateEnd;
    private $classroom;


    public function __construct($course, $teacher, $dateBegin,$dateEnd,$classroom)
    {
        $this->course = $course;
        $this->teacher = $teacher;
        $this->dateBegin = $dateBegin;
        $this->dateEnd = $dateEnd;
        $this->classroom = $classroom;
    }

    public static function importICS(String $ics) {
        $ical = new iCal("JLC_LECHIEN_Jonathan.ics"); 
        $teacher = substr($ics,0 , 3);
        foreach ($ical->cal["VEVENT"] as $event){
            $course = $event["DESCRIPTION_array"][1];
            $split = explode("Matière : ",$course);
            $split2 = explode("\n",$split[0]);
            var_dump($split);
            // $dateBegin = $event['DTSTART'];
            // $dateEnd = $event['DTEND'];
            // $classroom = $event['DESCRIPTION']['nSalle'];
            
        }
       //echo var_dump($ical->cal);; 
    }




}