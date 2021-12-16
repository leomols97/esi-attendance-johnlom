<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EvaluationTest extends DuskTestCase
{

    public function testEvaluationCourse()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/seance-details/1')
                    ->assertSeeIn('@seance_title',"Cours: Gestion de projet")
                    ->assertSeeIn('@seance_teacher',"Professeur: fq0qbU8Hal")
                    ->assertSeeIn('@seance_date',"Date et heure: 2021-12-16 14:45:00");
        });
    }
}
