<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\FileModel;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /**
     * Test of number of students in the DB
     * @test
     * @return void
     */
    public function test_finPresences()
    {
        $count = count(FileModel::findPresences());
        //dd($count);
        $this->assertEquals($count, 2);
    }
}
