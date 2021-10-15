<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class FileModel extends Model
{
    use HasFactory;

    static public function findPresences()
    {
        //test2 heroku connection refused
        $presences = DB::select('
            SELECT p.Student, s.Date, s.Hour, s.Local, s.Cours, p.Present
            FROM Présences p
            JOIN Seance s ON p.seance = s.id
            ORDER BY s.Date ASC
        ');
        return $presences;
    }
}
