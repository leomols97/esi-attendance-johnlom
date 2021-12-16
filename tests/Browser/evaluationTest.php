<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class evaluationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/seance-details/1')
                    ->assertSee('PRJG5-Gestion de projet')
                    ->assertSee('Servais')
                    ->assertSee('2021-12-16 14:45:00');
        });
    }
}
