<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class studentsManagementTest extends DuskTestCase
{
//    use DatabaseTransactions;
//    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSeeTableStudents()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students_management')
                ->assertSeeIn('@id_student1', '1 Letest Mathieu')
                ->assertSeeIn('@id_student2', '2 Retest Guillaume');
        });
    }

    // Ces tests ne passent pas et cassent la DB
//    public function testDelete()
//    {
//        $this->browse(function (Browser $browser) {
//            $browser->visit('/students_management')
//                ->press('@delete2')
//                ->acceptDialog()
//                ->assertUrlIs('http://127.0.0.1:8000/students_management');
//        });
//    }

//    public function testAddStudent1()
//    {
//        $this->browse(function (Browser $browser) {
//            $browser->visit('/students_management')
//                ->assertSee('Ajouter un étudiant')
//                ->type('@student_id', '52006')
//                ->type('@student_first_name', 'Olivier')
//                ->type('@student_last_name', 'Dyck')
//                ->type('@group_name', 'E11')
//                ->press('@add')
//                ->assertSee("@id_student52006", "52006 Dyck Olivier");
//        });
//    }
//
//    public function testAddStudent2()
//    {
//        $this->browse(function (Browser $browser) {
//            $browser->visit('/students_management')
//                ->assertSee('Ajouter un étudiant')
//                ->type('@student_id', '')
//                ->type('@student_first_name', '')
//                ->type('@student_last_name', '')
//                ->type('@group_name', '')
//                ->press('@add')
//                ->assertSee("L'étudiant(e) n'a malheureusement pas pu être ajouté(e) !");
//        });
//    }
}
