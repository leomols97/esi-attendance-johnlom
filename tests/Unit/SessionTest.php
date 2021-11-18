<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 
     * A basic unit test example.
     *
     * @return void
     */
    public function test_importICS()
    {
        $ics = ("..\..\public\JLC_LECHIEN_Jonathan.ics");
        Session::importICS($ics);

        $this->assertDatabaseCount('courses', 100);
        $this->assertDatabaseCount('teachers', 100);
        $this->assertDatabaseCount('groups', 100);
        $this->assertDatabaseCount('courses_groups', 100);
        $this->assertDatabaseCount('seances', 100);
    }
}
