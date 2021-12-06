<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\AddStudentToCourseModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class AddStudentToCourseTest extends TestCase {
    /**
    * A basic unit test example.
    *
    * @return void
    */

    public function test_example() {
        $this->assertTrue( true );
    }

    /**
    * Trying to add an unexisting student
    *
    * @throws Exception expection exception
    *
    * @return void
    */

    public function test_add_student_to_course_unexisting_student() {
        $this->expectException( QueryException::class );
        AddStudentToCourseModel::addStudentToCourse( 1, 1000000, true );
    }

    /**
    * Trying to add a student to an unexisting course
    *
    * @throws Exception expection exception
    *
    * @return void
    */

    public function test_add_student_to_course_unexisting_course() {
        $this->expectException( QueryException::class );
        AddStudentToCourseModel::addStudentToCourse( 1000000, 1, true );
    }

    /**
    * Trying to add a student to an existing course
    *
    * @return void
    */

    public function test_add_student_to_course_existing_student_and_course() {
        AddStudentToCourseModel::addAndUpdateStudentToCourse( 1, 1, true );
        $this->assertDatabaseHas( 'exception_student_list', [
            'student_id' => 1
        ] );
    }

    /**
    * Trying to delete an unexisting student
    *
    * @throws Exception expection exception
    *
    * @return void
    */

    public function test_delete_student_from_course_unexisting_student() {
        $this->expectException( \Exception::class );
        AddStudentToCourseModel::DeleteStudentFromCourse( 1, 1000000 );
    }

    /**
    * Trying to delete a student from an unexisting course
    *
    * @throws Exception expection exception
    *
    * @return void
    */

    public function test_delete_student_from_course_unexisting_course() {
        $this->expectException( \Exception::class );
        AddStudentToCourseModel::DeleteStudentFromCourse( 1000000, 1 );
    }

    /**
    * Trying to delete an existing student from an existing course
    *
    * @return void
    */

    public function test_delete_student_from_course_existing_student_and_course() {
        $student = DB::select( '
            SELECT *
            FROM exception_student_list
            WHERE course_id = 1
                AND student_id = 1
            ORDER BY id ASC
        ' );
        if ( empty( $student ) )
            AddStudentToCourseModel::addAndUpdateStudentToCourse( 1, 1, true );
        AddStudentToCourseModel::DeleteStudentFromCourse( 1, 1 );
        $this->assertDatabaseMissing( 'exception_student_list', [
            'student_id' => 1,
            'course_id' => 1
        ] );
    }
}
