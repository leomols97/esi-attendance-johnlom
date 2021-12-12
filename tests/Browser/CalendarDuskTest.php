<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CalendarDuskTest extends DuskTestCase
{

    /**
     * Checks if the Calendar page is visitable
     */
    public function test_visit_calendar()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/calendar')
                    ->assertSee("Vue calendrier de l'horaire");
        });
    }

    /**
     * check if this day has an event before
     */
    // public function IsDateHasEvent( $date ) {
    //     $allEvents = [];
    //     $allEvents = $('#calendar').fullCalendar('clientEvents');
    //     $event = $.grep($allEvents, function ($v) {
    //         return +$v.start() === +$date;
    //     });
    //     return $event.length() > 0;
    // }

    /**
     * Checks if a special event exists in the month of December
     * This thest won't work if the showed month is another than the 12 of 2021
     *
     * @return void
     */
    public function test_if_has_event()
    {
        $this->browse(function (Browser $browser) { // Le 5ème elt (table) et 7è (tr) et 14e et 15e et 16e n'ont pas de classe
            $browser->assertSeeIn('#calendar > div.fc-view-container > div > table > tbody > tr > td > div > div > div:nth-child(1) > div.fc-content-skeleton > table > tbody > tr:nth-child(1) > td.fc-event-container > a > div > span.fc-title', 'Gestion de projet');
        });
    }

    /**
     * Checks if the header is shown or not
     *
     * @return void
     */
    public function test_header_is_shown()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/calendar')
                    ->assertSee("Vue calendrier de l'horaire");
        });
    }
}
