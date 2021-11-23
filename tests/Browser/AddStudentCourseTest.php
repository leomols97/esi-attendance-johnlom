<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddStudentCourseTest extends DuskTestCase
{

    public function testAddStudent1(){
        $this->browse(function (Browser $browser){
            $browser->visit('/addStudentToCourse')
                ->select('student_id', '0')
                ->select('course_id', 'Gestion de projet')
                ->press('Add')
                ->assertUrlIs('http://127.0.0.1:8000/addStudentToCourse/add');
        });
    }

    public function testAddStudent2(){
        $this->browse(function (Browser $browser){
            $browser->visit('/addStudentToCourse')
                ->select('student_id', '1')
                ->select('course_id', 'Développement web V')
                ->press('Add')
                ->assertUrlIs('http://127.0.0.1:8000/addStudentToCourse/add');
        });
    }
}
