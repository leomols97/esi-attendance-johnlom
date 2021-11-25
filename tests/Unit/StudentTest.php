<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Student;

class StudentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
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
    }
}
