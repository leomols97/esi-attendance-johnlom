<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Course;

class evaluationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetInfoCourse()
    {
        $infoCourse = Course::getInfoSeance(1);
        $this->assertEquals($infoCourse[0]->ue, "PRJG5");
        $this->assertEquals($infoCourse[0]->name, "Gestion de projet");
        $this->assertEquals($infoCourse[0]->last_name, "Servais");
        $this->assertEquals($infoCourse[0]->start_time, "2021-12-16 14:45:00");
    }
}
