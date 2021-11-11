<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function import (Request $request) {
    	$this->validate($request, [
    		'fichier' => 'bail|required|file|mimes:ics'
    	]);

    	// 2. On déplace le fichier uploadé vers le dossier "public" pour le lire
    	$fichier = $request->fichier->move(public_path(), $request->fichier->hashName());

    }

    public function importIndex () {
        return view('index');
    }

}
