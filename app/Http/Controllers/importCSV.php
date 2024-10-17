<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class importCSV extends Controller
{
    public static function import(Request $request) {
        if (($open = fopen('C:\Users\dihay\Downloads\Import.csv', 'r')) !== false) {
            while(($data = fgetcsv($open, 1000 , ",")) !== false) {
                $array[] = $data;
                    DB::table("tbl_import")->insert([

                        "firstname"     =>      $data[0],
                        "lastname"      =>      $data[1],
                        "age"           =>      $data[2],
                        "address"       =>      $data[3]
                    ]);
                }

            return[
                "success" => true,
                "message" => "Imported successfully"
            ];
        }
        else{
            return[
                "success" => false,
                "message" => "File does not exist"
            ];
        }
    }
}
