<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Student;

class studentsManagementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test to add a student.
     */
    public function test_add_Student_when_successful()
    {
        Student::add(52006, "Olivier", "Dyck","E11");
        $this->assertDatabaseHas('students', [
            'id' => 52006,
            'first_name' => "Olivier",
            'last_name' => "Dyck",
        ]);
        $this->assertDatabaseHas('student_groups', [
            'id' => 3,
            'student_id' => "Olivier",
            'group_name' => "E11",
        ]);
        $this->assertDatabaseCount('students', 3);
        $this->assertDatabaseCount('student_groups', 3);
    }

    /**
     * Test to add a student who already exist.
     */
    public function test_add_Student_when_already_exists()
    {
        Student::add(1, "Olivier", "Dyck", "E11");
        $this->assertDatabaseCount('students', 2);
        $this->assertDatabaseCount('student_groups', 2);
    }

  
    /**
     * Test to add a student with a negative id.
     */
    public function test_add_Student_when_negative_id()
    {
        Student::add(-1, "Olivier", "Dyck", "E11");
        $this->assertDatabaseCount('students', 2);
        $this->assertDatabaseCount('student_groups', 2);
    }

    /**
     * Test to add a student without group.
     */
    public function test_add_Student_when_no_group()
    {
        Student::add(52006, "", "Dyck", "E11");
        $this->assertDatabaseCount('students', 2);
        $this->assertDatabaseCount('student_groups', 2);
    }

    /**
     * Test to add a student without first name or last name.
     */
    public function test_add_Student_when_first_or_last_name_empty()
    {
        Student::add(52006, "", "Dyck", "E11");
        Student::add(52007, "Olivier", "", "E11");
        Student::add(52008, "", "", "E11");
        $this->assertDatabaseCount('students', 2);
        $this->assertDatabaseCount('student_groups', 2);
    }
    
    /**
     * Test the delete of a student.
     */
    public function test_delete_student()
    {

        $this->assertDatabaseHas('students', [
            'id' => '1',
        ]);

        Student::delete(1);

        $this->assertDatabaseMissing('students', [
            'id' => '1',
        ]);

        $this->assertDatabaseMissing('student_groups', [
            'id' => '1',
        ]);
    }
}
