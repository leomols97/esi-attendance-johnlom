<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Mockery as m;

class studentsConsultationTest extends DuskTestCase
{

    /**
     * A Dusk test for students consultation.
     *
     * @return void
     */
    public function testCorrectConsultation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students/0')
                    ->assertSee('P6FU1t77lp');
        });
    }

    /**
     * A Dusk test for students consultation.
     *
     * @return void
     */
    public function testCorrectConsultation2()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students/0')
                    ->assertSee('8Ar0FsLanB');
        });
    }

    /**
     * A Dusk test for students consultation.
     *
     * @return void
     */
    public function testCorrectConsultation3()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students/0')
                    ->assertSee('Les étudiants');
        });
    }

    /**
     * A Dusk test for students consultation.
     *
     * @return void
     */
    public function testCorrectConsultation4()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students/0')
                    ->assertSee('51');
        });
    }

    /**
     * A Dusk test for students consultation with an incorrect seance.
     *
     * @return void
     */
    public function testIncorrectConsultation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/students/10')
                    ->assertDontSee('P6FU1t77lp');
        });
    }

    public function test_assert_host_is_not()
    {
        $driver = m::mock(stdClass::class);
        $driver->shouldReceive('getCurrentURL')->andReturn(
            'http://127.0.0.1:8000/students/0/test',
        );
        $browser = new Browser($driver);

        $browser->assertHostIsNot('laravel.com');
    }

    public function test_assert_port_is()
    {
        $driver = m::mock(stdClass::class);
        $driver->shouldReceive('getCurrentURL')->times(1)->andReturn(
            'http://127.0.0.1:8000/students/0',
        );
        $browser = new Browser($driver);
        $browser->assertPortIs('8000');
    }

    public function test_assert_path_begins_with()
    {
        $driver = m::mock(stdClass::class);
        $driver->shouldReceive('getCurrentURL')->andReturn(
            'http://127.0.0.1:8000/students/0',
        );
        $browser = new Browser($driver);
        $browser->assertPathBeginsWith('/stu');
    }

    public function test_assert_path_is()
    {
        $driver = m::mock(stdClass::class);
        $driver->shouldReceive('getCurrentURL')->andReturn(
            'http://127.0.0.1:8000/students/0',
        );
        $browser = new Browser($driver);
        $browser->assertPathIs('/students/0');
    }
     
}
