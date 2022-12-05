<?php

namespace App\Imports;

use App\Models\Destination;
use App\Models\Employee;
use App\Models\Experiance;
use App\Models\Qualification;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;
class EmployeeImport implements ToCollection
{
   
    public function collection(Collection $row)
    {
        // $data=[];
        // dd($row);

        $data = array(
            'name'              => $row[1][0],
            'gender'            => $row[1][1],
            'dob'               => $row[1][2],
            'fathername'        => $row[1][3],
            'address'           => $row[1][4],
            'image'             => $row[1][5],
            'email'             => $row[1][6],
            'phonenumber'       => $row[1][7],
        );
        DB::table('employees')->insert($data);

        $e_id = DB::table('employees')->select('id')->first();
        // dd($e_id);
        $employee_id = $e_id->id;
        
        $data2 = array(
            'qualification'  => $row[1][8],
            'yop'            => $row[1][9],
            'collegename'    => $row[1][10],
            'employee_id'    =>$employee_id,
        );
        DB::table('qualifications')->insert($data2);
        $data3 = array(
            'experiance'     => $row[1][11],
            'years'          => $row[1][12],
            'jobtitle'       => $row[1][13],
            'employee_id'    =>$employee_id,
        );
        DB::table('experiances')->insert($data3);
        $data4 = array(
            'destination'     => $row[1][14],
            'salaryexpected'  => $row[1][15],
            'employee_id'    =>$employee_id,
        );
        DB::table('destinations')->insert($data4);

       
}
}

