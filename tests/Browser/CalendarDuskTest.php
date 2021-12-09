<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CalendarDuskTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

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
     * A Dusk test example.
     *
     * @return void
     */
    public function IsDateHasEvent()
    {
        $this->browse(function (Browser $browser) { // Le 5ème elt (table) et 7è (tr) et 14e et 15e et 16e n'ont pas de classe
            $browser->assertSeeIn('.main .fc-toolbar .fc-view-container .fc-view-container .fc-body .fc-widget-content .fc-scroller .fc-day-grid .fc-row .fc-bg .fc-content-skeleton .fc-event-container .fc-day-grid-event .fc-content .fc-title', 'Gestion de projet');
        });
    }
}
