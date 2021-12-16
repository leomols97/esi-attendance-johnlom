<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EvaluationTest extends DuskTestCase
{

    public function test_check_information() {
        $this->browse(function(Browser $browser) {
            $browser->visit('/seance-details/1')
                    ->assertSee("Nom du cours : Gestion de projet")
                    ->assertSee("Nom du professeur : ZmYhdybeHf Qlw5Ovitdv")
                    ->assertSee("Date et heure de la séance : de 2021-12-16 14:45:00 à 2021-12-16 18:00:00");
        });
    }

}
