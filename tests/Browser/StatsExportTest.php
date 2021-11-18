<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StatsExportTest extends DuskTestCase
{
    /**
     * Checks the download function from the stats export page, using the XLSX format and an arbitrary name.
     * (It doesn't check the downloaded file itself but if the action does trigger a download.)
     * 
     * @todo Edit seeders with some static data on top of the random one.
     */
    public function test_xlsx_download()
    {
        $this->browse(function (Browser $browser) {
            $name = "goku";
            $browser->visit('/exportStats')
                    ->type('name', 'goku')
                    ->select('extension', 'xlsx')
                    ->press('Exporter')
                    ->assertUrlIs('http://127.0.0.1:8000/exportStats'); // POST is handled by the same page
        });
    }

    /**
     * Checks the download function from the stats export page, using the CSV format and an arbitrary name.
     * (It doesn't check the downloaded file itself but if the action does trigger a download.)
     */
    public function test_csv_download()
    {
        $this->browse(function (Browser $browser) {
            $name = "vegeta";
            $browser->visit('/exportStats')
                    ->type('name', 'goku')
                    ->select('extension', 'csv')
                    ->press('Exporter')
                    ->assertUrlIs('http://127.0.0.1:8000/exportStats'); // POST is handled by the same page
        });
    }

}