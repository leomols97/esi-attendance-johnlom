<?php

namespace Tests\Unit;

use Tests\TestCase;
use \Illuminate\Support\Facades\DB;

use App\Models\Seance;

class SeanceTest extends TestCase {
    public function test_get_presences() {
        $seance = Seance::getInfoSeance(1);
        $this->assertEquals($seance[0]->ue, "PRJG5");
        $this->assertEquals($seance[0]->name, "Gestion de projet");
        $this->assertEquals($seance[0]->acronym, "8TWOxc1XAp");
        $this->assertEquals($seance[0]->first_name, "ZmYhdybeHf");
        $this->assertEquals($seance[0]->last_name, "Qlw5Ovitdv");
        $this->assertEquals($seance[0]->start_time, "2021-12-16 14:45:00");
        $this->assertEquals($seance[0]->end_time, "2021-12-16 18:00:00");
    }
}
