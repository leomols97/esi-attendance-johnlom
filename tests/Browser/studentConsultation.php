<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class studentConsultation extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function consultStudentAttendency()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students/1')
                    ->assertSeeIn('@id_student', '');
        });
    }
}
