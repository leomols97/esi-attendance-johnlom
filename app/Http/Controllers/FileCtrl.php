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

        return view("file_view");
    }

    function export_csv(Request $request)
    {
        $fileName = $file_name = $request->name.".".$request->extension;;
        $presences = FileModel::findPresences();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Student', 'Beginning_hour', 'Ending_hour', 'Local', 'Cours', 'Presence');
        $file = fopen('test.csv', 'w');

        fputcsv($file, $columns);
        foreach($presences as $student){
            $student_details = array();
            foreach($student as $student_detail => $student_detail_value){
                array_push($student_details, (string) $student_detail_value);
            }
            fputcsv($file, $student_details);
        }

        fclose($file);
    }
}
