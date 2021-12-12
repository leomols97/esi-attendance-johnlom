<?php

namespace Tests\Unit;

use Tests\TestCase;
use Exception;
use \Illuminate\Support\Facades\DB;

use App\GroupsCSV;
use App\Queries;
use App\Models\PresenceFormatter;

class PresenceSaverTest extends TestCase
{

    public function test_insert_presences()
    {
        $success = False;

        $testPresences = [
            [
                "seance_id" => 0,
                "student_id" => 1,
                "is_present" => true
            ]
        ];
        Queries::insertPresences($testPresences);

        $presences = DB::table('presences')->get();
        foreach($presences as $presence) {
            if($presence->seance_id == $testPresences[0]["seance_id"] 
                && $presence->student_id == $testPresences[0]["student_id"]
                && $presence->is_present == $testPresences[0]["is_present"]) {
                    $success = True;
                    break;
            }
        }

        $this->assertTrue($success);
    }

    public function test_format_presences()
    {
        $success = false;

        $studentsIds = [];
        $seanceId = 1;

        $presences = PresenceFormatter::savePresences($studentsIds, $seanceId);
        print(var_dump($presences[0]));
        foreach($presences as $presence) {
            if($presence == ["seance_id" => $seanceId,"student_id" => $studentsIds[0],"is_present" => true]) {
                $success = true;
                break;
            }
        }

        $this->assertTrue($success);
    }


}
