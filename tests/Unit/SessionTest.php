<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Session;

class SessionTest extends TestCase
{
    /**
     *
     * A basic unit test example.
     *
     * @return void
     */
    public function test_importICS()
    {
        Session::importICS("horaire.ics");

        $this->assertDatabaseCount('courses', 7);
        $this->assertDatabaseCount('teachers', 1);
        $this->assertDatabaseCount('groups', 13);
        $this->assertDatabaseCount('courses_groups', 187);
        $this->assertDatabaseCount('seances', 187);
    }
}
