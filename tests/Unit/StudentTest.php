<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add_Student_when_successful()
    {
        Student::add(52006, "Olivier", "Dyck");
        $this->assertDatabaseHas('students', [
            'id' => 52006,
            'first_name' => "Olivier",
            'last_name' => "Dyck",
        ]);
        $this->assertDatabaseCount('students', 3);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add_Student_when_already_exists()
    {
        Student::add(1, "Olivier", "Dyck");
        $this->assertDatabaseCount('students', 2);
    }

  
       /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add_Student_when_negative_id()
    {
        Student::add(-1, "Olivier", "Dyck");
        $this->assertDatabaseCount('students', 2);
    }

       /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add_Student_when_first_or_last_name_empty()
    {
        Student::add(52006, "", "Dyck");
        Student::add(52007, "Olivier", "");
        Student::add(52008, "", "");
        $this->assertDatabaseCount('students', 2);
    }
}
