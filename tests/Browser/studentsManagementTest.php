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
                    ->assertSee('@id_student', "1 Letest Mathieu")
                    ->assertSee('@id_student', "2 Retest Guilaume");

            //à modifier, pas correct
            $browser2->visit('/studentsManagement')
                     ->assertSee('@id_student',"1 Letest Mathieu")
                     ->type('@id_student_to_delete', 1)
                     ->press('@delete_button')
                     ->assertDontSee('id_student', 1);

            $browser3->visit('/studentsManagement')
                    ->assertSee('Ajouter un étudiant')
                    ->type('@student_id', '52006')
                    ->type('@student_first_name', 'Olivier')
                    ->type('@student_last_name', 'Dyck')
                    ->type('@group_name','E11')
                    ->press('@add')
                    ->assertSee("@id_student", "52006 Dyck Olivier")
                    ->assertSee('Ajouté(e) !');
                    
            $browser4->visit('/studentsManagement')
                    ->assertSee('Ajouter un étudiant')
                    ->type('@student_id', '')
                    ->type('@student_first_name', '')
                    ->type('@student_last_name', '')
                    ->type('@group_name', '')
                    ->press('@add')
                    ->assertSee("L'étudiant(e) n'a malheureusement pas pu être ajouté(e) !");
        });
    }
}
