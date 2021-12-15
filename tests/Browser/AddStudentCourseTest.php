<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddStudentCourseTest extends DuskTestCase
{

    public function testAddStudent1(){
        $this->browse(function (Browser $browser){
            $browser->visit('/seance-details')
                ->select('student_id', '0')
                ->select('course_id', '1')
                ->press('Add')
                ->assertSee('0');
                //->assertUrlIs('http://127.0.0.1:8000/seance-details/1');
        });
    }

    public function testAddStudent2(){
        $this->browse(function (Browser $browser){
            $browser->visit('/seance-details')
                ->select('student_id', '1')
                ->select('course_id', 'Développement web V')
                ->press('Add')
                ->assertUrlIs('http://127.0.0.1:8000/seance-details/1');
        });
    }

    public function testDeleteStudent1(){
        $this->browse(function (Browser $browser){
            $browser->visit('/seance-details')
                ->select('student_id', '2')
                ->select('course_id', '1')
                ->press('Add')
                ->assertUrlIs('http://127.0.0.1:8000/seance-details/delete/1/2');
        });
    }

    public function testDeleteStudent2(){
        $this->browse(function (Browser $browser){
            $browser->visit('/seance-details')
                ->select('student_id', '1')
                ->select('course_id', 'Développement web V')
                ->press('Add')
                ->assertUrlIs('http://127.0.0.1:8000/seance-details/delete');
        });
    }

    //TODO: Modifier les tests
}
