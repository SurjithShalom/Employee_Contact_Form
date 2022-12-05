<?php

namespace App\Exports;

use App\Models\Employee;
use App\Models\PDF;
use Maatwebsite\Excel\Concerns\FromCollection;

class PDFExport implements FromCollection
{
   
    public function collection()
    {
        // return Employee::leftjoin('qualifications','qualifications.employee_id','=','employees.id')
        //                        ->leftjoin('experiances','experiances.employee_id','=','employees.id')
        //                        ->leftjoin('destinations','destinations.employee_id','=','employees.id')
        //                        ->get();
        return Employee::leftjoin('qualifications','qualifications.employee_id','=','employees.id')
        ->leftjoin('experiances','experiances.employee_id','=','employees.id')
        ->leftjoin('destinations','destinations.employee_id','=','employees.id')->select('name','gender','dob','email','phonenumber','qualification','yop','experiance','years','destination','salaryexpected')->get();
    }
}
