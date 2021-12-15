<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddStudentCourseTest extends DuskTestCase
{
    public function testAddStudent1(){
        $this->browse(function (Browser $browser){
            $browser->visit('/seance-details/1')
                ->select('@select_student_id', '2')
                ->press('Ajouter')
                ->assertUrlIs('http://127.0.0.1:8000/seance-details/1');
        });
    }

    public function testDeleteStudent1(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/seance-details/1')
                ->press('@button_delete2')
                ->assertUrlIs('http://127.0.0.1:8000/seance-details/1/delete/2');
        });
    }
}
