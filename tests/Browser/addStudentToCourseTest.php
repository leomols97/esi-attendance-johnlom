<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class addStudentToCourseTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_add_student_to_course_from_seance()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/seances/2') // la séance numéro 2 n'a pas été encore créée
                    ->assertSee('Les étudiants présents au cours de PRJG5 le 2004-11-22')
                    ->assertSeeIn('@id_student', '1')
                    ->assertSeeIn('@id_student', '0')
                    ->type('@select', '3')
                    ->press('@add')
                    ->assertSeeIn('@id_student', '2');
        });
    }
}
