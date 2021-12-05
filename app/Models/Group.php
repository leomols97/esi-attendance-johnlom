<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Group extends Model
{
    /**
     * Method to get all groups in the database.
     */
    public static function findAllGroups()
    {
        $groups = DB::select('
            SELECT name
            FROM groups
        ');
        return $groups;
    }
}
