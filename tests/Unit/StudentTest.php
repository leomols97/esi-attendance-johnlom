<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Student;

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
        $student = new Student(52006, "Olivier", "Dyck");
        Student::add($student);
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
        $student = new Student(1, "Olivier", "Dyck");
        Student::add($student);
        $this->assertDatabaseCount('students', 2);
    }

  
       /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add_Student_when_negative_id()
    {
        $student = new Student(-1, "Olivier", "Dyck");
        Student::add($student);
        $this->assertDatabaseCount('students', 2);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add_Student_when_first_or_last_name_empty()
    {
        $student1 = new Student(52006, "", "Dyck");
        $student2 = new Student(52007, "Olivier", "");
        $student3 = new Student(52008, "", "");
        Student::add($student1);
        Student::add($student2);
        Student::add($student3);
        $this->assertDatabaseCount('students', 2);
    }
    
    public function test_delete_student()
    {

        $this->assertDatabaseHas('students', [
            'id' => '1',
        ]);

        Student::delete(1);

        $this->assertDatabaseMissing('students', [
            'id' => '1',
        ]);
    }
}
