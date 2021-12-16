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
        $details ="";  
        $details = $details_recordSet[0]->name . "" . $details_recordSet[0]->last_name . "" .  $details_recordSet[0]->start_time;

        $this->assertEquals($details,"Gestion de projet sDajKNXm3a 2021-12-16 14:45:00");
    }
}
