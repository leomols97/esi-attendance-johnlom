<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\AddStudentToCourseModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class AddStudentToCourseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /**
     * Trying to add an unexisting student
     *
     * @return void
     */
    public function test_add_student_to_course_unexisting_student()
    {
        $this->expectException(QueryException::class);
        AddStudentToCourseModel::addStudentToCourse(1, 1000000, true);
    }

    /**
     * Trying to add a student to an unexisting course
     *
     * @return void
     */
    public function test_add_student_to_course_unexisting_course()
    {
        $this->expectException(QueryException::class);
        AddStudentToCourseModel::addStudentToCourse(1000000, 1, true);
    }

    /**
     * Trying to add a student to an existing course
     *
     * @return void
     */
    public function test_add_student_to_course_existing_student_and_course()
    {
        AddStudentToCourseModel::addStudentToCourse(1, 1, true);
        $this->assertDatabaseHas('exception_student_list', [
            'student_id' => 1
        ]);
    }
}
