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

    public function testAddStudent()
   {
       $this->browse(function (Browser $browser) {
           $browser->visit('/students_management')
               ->assertSee('Ajouter un étudiant')
               ->type('@student_id', '52006')
               ->type('@student_first_name', 'Olivier')
               ->type('@student_last_name', 'Dyck')
               ->type('@group_name', 'E11')
               ->press('@add')
               ->assertSeeIn("@id_student52006", "52006 Dyck Olivier");
       });
       Student::deleteStudent(52006);
   }
    
   public function testDelete()
   {
       $this->browse(function (Browser $browser) {
           $browser->visit('/students_management')
               ->press('@delete2')
               ->acceptDialog()
               ->assertUrlIs('http://127.0.0.1:8000/students_management');
       });
       Student::add(2, Retest, Guillaume, E12);
   }

   

   
}
