<?php

namespace App\Http\Controllers;
use App\Exports\EmployeeExport;
use App\Exports\PDFExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use PDF;
use App\Imports\QualificationImport;
use App\Models\Destination;
use App\Models\Employee;
use App\Models\Experiance;
use App\Models\Qualification;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
class ImportController extends Controller
{
    public function fileImport(Request $request)

    {
        // dd($request->file('csvfile'));
        $request->validate([
            'csvfile' => 'required|mimes:xls,xlsx',
        ]);
        $photo = $request->file('csvfile');
     
              $path = IOFactory::load($photo->getRealPath());
              $value  = $path->getActiveSheet();
              $datasheet    = $value->getHighestDataRow();
              $column_limit = $value->getHighestDataColumn();
              $view    = range( 2, $datasheet );
              $column_range = range( 'F', $column_limit );
              $startcount = 2;
              $data = array();
              $data2 = array();
              $data3 = array();
              $data4 = array();

              foreach ( $view as $row ) {
                // dd($row);
                $data = [
                      'name' => $value->getCell( 'A' . $row )->getValue(),
                      'gender' =>$value->getCell( 'B' . $row )->getValue(),
                      'dob' => $value->getCell( 'C' . $row )->getValue(),
                      'fathername' => $value->getCell( 'D' . $row )->getValue(),
                      'address' => $value->getCell( 'E' . $row )->getValue(),
                      'image' => $value->getCell( 'F' . $row )->getValue(),
                      'email' => $value->getCell( 'G' . $row )->getValue(),
                      'phonenumber' => $value->getCell( 'H' . $row )->getValue(),
                ];
                $user = Employee::create($data);
                $emp_id = $user->id;
              
                  $data2 = [
                    'qualification' => $value->getCell( 'I' . $row )->getValue(),
                    'yop' =>$value->getCell( 'J' . $row )->getValue(),
                    'collegename' => $value->getCell( 'K' . $row )->getValue(),
                    'employee_id' => $emp_id,
                 ];
                

                 $user2 = Qualification::create($data2);
                
                $data3 = [
                    'experiance' => $value->getCell( 'L' . $row )->getValue(),
                    'years' =>$value->getCell( 'M' . $row )->getValue(),
                    'jobtitle' => $value->getCell( 'N' . $row )->getValue(),
                    'employee_id' => $emp_id,
                ];
                $user3 = Experiance::create($data3);
               
                $data4 = [
                    'destination' => $value->getCell( 'O' . $row )->getValue(),
                    'salaryexpected' =>$value->getCell( 'P' . $row )->getValue(),
                    'employee_id' => $emp_id,
                ];
                $user4 = Destination::create($data4);
                // dd($user4);
                  $startcount++;
              }
              return redirect('employee');
    }
    public function fileexport()
    {
        return Excel::download(new EmployeeExport, 'employee.xlsx');
    }
    public function filepdf()
    {
     {
            
     return Excel::download(new PDFExport, 'employee.pdf'); 
           
     }
            
    }
}
