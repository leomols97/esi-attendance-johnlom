<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class seanceDetailsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_seance_details()
    {   
        $details = Seance::getSeanceDetails(1);
        $this->assertEquals($details, array("PRJG5","KUmNxUEu18","2021-12-16 14:45:00"));
    }
}
