<?php

namespace App;

use \Illuminate\Support\Facades\DB;

class Queries {

    /**
     * Insérer au sein de la base de données les affectations de groupes par étudiant.
     * Au préalable, les affectations déjà présentes sont supprimées afin que des affectations précédentes
     * ne soient pas prises en considération.
     */
    static public function insertGroupsForStudents($data) {
        DB::table('student_groups')->delete();
        DB::table('student_groups')->insert($data);
    }

}
