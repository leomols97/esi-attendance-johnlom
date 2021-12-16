<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PresenceSaverTest extends DuskTestCase
{
    /**
     * Checks if you can check all checkboxes at once using the "check all" button.
     */
    // public function test_check_all()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/seance-details/1')
    //                 ->check("@select-all")
    //                 ->assertChecked("@select-all")
    //                 ->assertChecked("@54259");
    //     });
    // }

    // /**
    //  * Checks if in normal conditions, the success message is returned.
    //  */
    // public function test_validate()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/seance-details/1')
    //                 ->check("@select-all")
    //                 ->press("Valider les présences")
    //                 ->assertUrlIs("https://esi-attendance-johnlom.herokuapp.com/seance-details/1/validation")
    //                 ->assertPresent("@success");
    //     });
    // }

    /**
     * Checks if in normal conditions, the success message is returned.
     */
    public function test_Affichage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/seance-details/1')
                    ->check("@details")
                    ->assertSee("Nom du cours : Gestion de projet / Début : 2021-12-16 14:45:00 / Fin : 2021-12-16 18:00:00 / Le professeur : ZmYhdybeHf Qlw5Ovitdv");
        });
    }

}
