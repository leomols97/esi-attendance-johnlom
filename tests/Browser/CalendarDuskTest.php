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
                    ->assertSee("Gestion de projet");
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
     * This test won't work if the showed month is another than the 12 of 2021
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
            $month = date('m');
            $verbal_month = "";
            switch($month){
                case 1:
                    $verbal_month = "janvier";
                    break;
                case 2:
                    $verbal_month = "février";
                    break;
                case 3:
                    $verbal_month = "mars";
                    break;
                case 4:
                    $verbal_month = "avril";
                    break;
                case 5:
                    $verbal_month = "mai";
                    break;
                case 6:
                    $verbal_month = "juin";
                    break;
                case 7:
                    $verbal_month = "juillet";
                    break;
                case 8:
                    $verbal_month = "août";
                    break;
                case 9:
                    $verbal_month = "septembre";
                    break;
                case 10:
                    $verbal_month = "octobre";
                    break;
                case 11:
                    $verbal_month = "novembre";
                    break;
                case 12:
                    $verbal_month = "décembre";
                    break;
                default: 
                    $verbal_month = "décembre";
            }
            $browser->visit('/calendar')
                    ->assertSee($verbal_month);
        });
    }
}
