<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;
use App\Models\FileModel;

class FileCtrl extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        $file_name = "test.csv";
        $presences = FileModel::findPresences();

        print_r($presences);

        return view("file_view");
    }

    public function export (Request $request)
    {
    	// 1. Validation des informations du formulaire
    	$this->validate($request, [
    		'name' => 'bail|required|string',
    		'extension' => 'bail|required|string|in:xlsx,csv'
    	]);

    	// 2. Le nom du fichier avec l'extension : .xlsx ou .csv
    	$file_name = $request->name.".".$request->extension;

    	// 3. On récupère données de la table "clients"
    	$presences = FileModel::findPresences();

    	// 4. $writer : Objet Spatie\SimpleExcel\SimpleExcelWriter
    	//$writer = SimpleExcelWriter::create($file_name);

 		// 5. On insère toutes les lignes au fichier Excel $file_name
    	//$writer->addRows($presences->toArray());
        $fp = fopen('file.csv', 'w');

        $list = $presences;
        foreach ($list as $fields) {
            fputcsv($fp,get_object_vars($fields));
        }

        fclose($fp);
        array_to_csv_download($presences);

        // 6. Lancer le téléchargement du fichier
        //$writer->toBrowser();
    }

    function array_to_csv_download($array, $filename = "export.csv", $delimiter=";") {
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="'.$filename.'";');

        // open the "output" stream
        // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
        $f = fopen('php://output', 'w');

        foreach ($array as $line) {
            fputcsv($f, $line, $delimiter);
        }
    }
}
