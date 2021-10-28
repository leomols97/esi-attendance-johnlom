<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CSVGroupsTest extends DuskTestCase
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
     * Checks if the group assignements page sends back an error when a wrong CSV file is given as input.
     */
    public function test_csv_error()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/importGroupsForStudents')
                    ->attach('studentsGroupsCSV', 'public/testAffectations.csv')
                    ->press('Importer le fichier')
                    ->assertVisible('.success');
        });
    }

    /**
     * Checks if the group assignments page sends back a success message when a valid CSV file is given as input.
     */
    public function test_csv_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/importGroupsForStudents')
                    ->attach('studentsGroupsCSV', 'public/testAffectationsInvalides.docx')
                    ->press('Importer le fichier')
                    ->assertVisible('.error');
        });        
    }
}