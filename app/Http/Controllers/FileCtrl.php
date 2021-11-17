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

        //print_r($presences);

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

        $columns = array('Student', 'Date', 'Local', 'Cours', 'Presence');
        /*
        $callback = function() use($presences, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);


            foreach ($presences as $presence)
            {
                $row['Student']  = $presence->Student;
                $row['Date']    = $presence->Date;
                // $hour;
                // $i = 0;
                // foreach ($presence->Hour as $char)
                // {
                //     if ($i == 2)
                //     {
                //         $i = 0;
                //     } else {
                //         $hour += $char;
                //     }
                // }
                // strrev($hour);
                $row['Hour']    = $presence->Hour;
                $row['Local']  = $presence->Local;
                $row['Cours']  = $presence->Cours;
                if ($presence->Present == 1) {
                    $row['Presence'] = "Present";
                } else {
                    $row['Presence'] = "Absent";
                }
                fputcsv($file, array($row['Student'], $row['Date'], $row['Hour'], $row['Local'], $row['Cours'], $row['Presence']));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
        */
        /*var_dump($presences[0]);
        $students = array();
        foreach ($presences as $student)
        {
            //var_dump ($student);
            $string = "";
            $student = array();
            foreach ($student as $stud => $stud_value)
            {
                //$string = "";
                $string = "\"" . $stud . "\"";
                //$stud = $string;
            }
        }
        $lines = array(
            // $this->return_arrays($presences)
            $presences
        );*/
        $file = fopen('test.csv', 'w');
        /*
        foreach ($lines as $line)
        {
            //var_dump($line);
            foreach ($line as $lin)
            {
                //var_dump($lin);
                fputcsv($file, (array) $lin);
            }
        }*/

        $students1=array();
        foreach($presences as $student){
            $student_details = array();
            foreach($student as $student_detail => $student_detail_value){
                $studentDetail_value_string = '"' . $student_detail_value . '"';
                array_push($student_details, $studentDetail_value_string);
            }
            array_push($students1, $student_details);
        }

        foreach($students1 as $student1){
            fputcsv($file, $student1);
        }
        //dd(FileModel::findPresences());
        fclose($file);
    }
}
