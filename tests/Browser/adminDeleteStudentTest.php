<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class adminDeleteStudentTest extends DuskTestCase
{
    
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testDeleteStudentAsAdmin()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/students')
                    ->assertValue('@id_student', 1)
                    ->type('@id_student_to_delete', 1)
                    ->press('@delete_button')
                    ->assertValueIsNot('id_student', 1);
        });
    }
}
