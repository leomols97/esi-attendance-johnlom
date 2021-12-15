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
    public function test_check_all()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students_management')
                    ->check("@select-all")
                    ->assertChecked("@select-all")
                    ->assertChecked("@0")
                    ->assertChecked("@1");
        });
    }

    /**
     * Checks if in normal conditions, the success message is returned.
     */
    public function test_validate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students_management')
                    ->check("@select-all")
                    ->press("Valider les présences")
                    ->assertUrlIs("http://127.0.0.1:8000/students/1/validation")
                    ->assertPresent("@success");
        });
    }

}
