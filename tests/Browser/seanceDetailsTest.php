<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class seanceDetailsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_details_of_seances_present()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/seance-details/1')
                    ->assertSeeIn('@seanceDetail', 'Gestion de projet sDajKNXm3a 2021-12-16 14:45:00');
        });
    }
}
