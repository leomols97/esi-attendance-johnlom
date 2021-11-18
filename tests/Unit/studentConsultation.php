<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Queries;

class studentConsultation extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {       
        //to do seeders for test
        $expectedcount = 2;
        $student = Queries::studentsForSeance(0);
        $count = $student -> count();
        $this->assertEquals($expectedcount,$count);
    }
}
