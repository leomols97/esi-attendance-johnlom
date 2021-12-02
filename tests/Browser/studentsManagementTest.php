<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class studentsManagementTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/studentsManagement')
                    ->assertSee('@id_student', 1)
                    ->assertSee('@first_name_student', "Mathieu")
                    ->assertSee('@last_name_student', "Letest")
                    ->assertSee('@id_student', 2)
                    ->assertSee('@first_name_student', "Guillaume")
                    ->assertSee('@last_name_student', "Retest");

            $browser2->visit('/studentsManagement')
                     ->assertSee('@id_student', 1)
                     ->type('@id_student_to_delete', 1)
                     ->press('@delete_button')
                     ->assertDontSee('id_student', 1);

            $browser3->visit('/studentsManagement')
                    ->assertSee('Ajouter un étudiant')
                    ->type('@student_id', '52006')
                    ->type('@student_first_name', 'Olivier')
                    ->type('@student_last_name', 'Dyck')
                    ->press('@add')
                    ->assertSee("@id_student", 52006)
                    ->assertSee('Ajouté(e) !');
                    
            $browser4->visit('/studentsManagement')
                    ->assertSee('Ajouter un étudiant')
                    ->type('@student_id', '')
                    ->type('@student_first_name', '')
                    ->type('@student_last_name', '')
                    ->press('@add')
                    ->assertSee("L'étudiant(e) n'a malheureusement pas pu être ajouté(e) !");
        });
    }
}
