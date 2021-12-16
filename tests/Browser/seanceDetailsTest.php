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
                    ->assertSeeIn('@course_name', 'PRJG5')
                    ->assertSeeIn('@teacher_name', 'KUmNxUEu18')
                    ->assertSeeIn('@date_seance', '2021-12-16 14:45:00');
        });
    }
}
