<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class addStudentTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddStudent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/addStudent')
                    ->assertSee('Ajouter un étudiant')
                    ->type('@student_id', '52006')
                    ->type('@student_first_name', 'Olivier')
                    ->type('@student_last_name', 'Dyck')
                    ->press('@add')
                    ->assertSee('Ajouté(e) !');
        });
    }

    public function testAddStudentFailed()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/addStudent')
                    ->assertSee('Ajouter un étudiant')
                    ->type('@student_id', '')
                    ->type('@student_first_name', '')
                    ->type('@student_last_name', '')
                    ->press('@add')
                    ->assertSee("L'étudiant(e) n'a malheureusement pas pu être ajouté(e) !");
        });
    }
    
}
