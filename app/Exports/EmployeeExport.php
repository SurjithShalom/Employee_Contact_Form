<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // dd('testing');
        // return Employee::all();
        return Employee::leftjoin('qualifications','qualifications.employee_id','=','employees.id')
                               ->leftjoin('experiances','experiances.employee_id','=','employees.id')
                               ->leftjoin('destinations','destinations.employee_id','=','employees.id')
                               ->get();
                               
    }
}
