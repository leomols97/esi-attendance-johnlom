<?php

namespace Tests\Unit;

use Tests\TestCase;
use \Illuminate\Support\Facades\DB;

use App\Models\Seance;
use App\Models\Course;
use App\Models\Teacher;

class EvaluationTest extends TestCase
{

    public function test_get_seance() {
        $seanceId = 1;
        $seance = Seance::getSeance($seanceId)[0];

        $this->assertEquals($seance->id, $seanceId);
        $this->assertEquals($seance->start_time, "2021-12-16 14:45:00");
        $this->assertEquals($seance->end_time, "2021-12-16 18:00:00");
    }

    public function test_get_course_from_seance() {
        $seanceId = 1;
        $course = Course::fromSeance($seanceId)[0];

        $this->assertEquals($course->ue, "PRJG5");
        $this->assertEquals($course->name, "Gestion de projet");
        $this->assertEquals($course->teacher_id, "8TWOxc1XAp");
    }

    public function test_get_teacher() {
        $teacherId = Course::fromSeance(1)[0]->teacher_id;
        $teacher = Teacher::getTeacher($teacherId)[0];

        $this->assertEquals($teacher->acronym, "8TWOxc1XAp");
        $this->assertEquals($teacher->first_name, "ZmYhdybeHf");
        $this->assertEquals($teacher->last_name, "Qlw5Ovitdv");
    }
 
}
