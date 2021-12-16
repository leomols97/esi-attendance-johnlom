<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SeanceInfoDuskTest extends DuskTestCase
{
    
  
    public function test_info()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/seance-details/1')
                ->assertSeeIn('@cours', 'PRJG5 - Gestion de projet')
                ->assertSeeIn('@prof', '8TWOxc1XAp - ZmYhdybeHf Qlw5Ovitdv')
                ->assertSeeIn('@seance', 'Début : 2021-12-16 14:45:00 - Fin : 2021-12-16 18:00:00');
        });
    }
}
