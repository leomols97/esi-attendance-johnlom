<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Seance;

class seanceDetailsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_seance_details()
    {   
        $details_recordSet = Seance::getSeanceDetails(1);
        $details = array($details_recordSet["name"],$details_recordSet["last_name"],$details_recordSet["start_time"]);
        $this->assertEquals($details, array("Gestion de projet","sDajKNXm3a","2021-12-16 14:45:00"));
    }
}
