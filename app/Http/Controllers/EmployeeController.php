<?php

namespace App\Http\Controllers;

use App\Exports\PDFExport;
use PDF;
use App\Models\Destination;
use App\Models\Employee;
use App\Models\EmployeeMark;
use App\Models\Experiance;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{

    public function index()
        {
            $employee = DB::table('employees')
                                ->leftJoin('qualifications', 'qualifications.employee_id','=','employees.id')
                                ->leftjoin('experiances','experiances.employee_id','=','employees.id')
                                ->leftjoin('destinations','destinations.employee_id','=','employees.id')
                                ->orderBy('id', 'DESC')
                                ->get();
                            
            return view('employee.index', compact('employee'));
        }
   public function create()
        {
            return view('employee.create');
        }
   public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'gender' => 'required',
                'dob' => 'required',
                'fathername' => 'required',
                'address' => 'required',
                'image' => 'required',
                'email' => 'required',
                'phonenumber' => 'required|numeric|digits:10',
                'qualification' => 'required',
                'yop' => 'required',
                'collegename' => 'required',
                'experiance' => 'required',
                'years' => 'required',
                'jobtitle' => 'required',
                'destination' => 'required',
                'salaryexpected' => 'required|numeric',
                
            ],[
                'name.required' => '*Name is required',
                'gender.required' => '*Select the gender',
                'dob.required' => '*Pleace select the date of birth' ,
                'fathername.required' => '*Enter the fathername',
                'address.required' => '*Enter the address',
                'image.required' => '*Select the image',
                'email.required' => '*Enter the email',
                'phonenumber.required' => '*Enter the phonenumber',
                'qualification.required' => '*Enter the qualification',
                'yop.required' => '*Enter the yop',
                'collegename.required' => '*Enter the collegename',
                'experiance.required' => '*Enter the experiance',
                'years.required' => '*Select the years',
                'jobtitle.required' => '*Enter the jobtitle',
                'destination.required' => '*Enter the destination',
                'salaryexpected.required' => '*Enter the Expected salary',
                

            ]);
            $input = $request->all();
            $filename= date('YmdHi').$request->file('image')->getClientOriginalName();
            $input['image']-> move(('public/assets/photos/'), $filename);
            $filename_change=Employee::create($input);
            $filename_change['image'] = $filename;
            $filename_change ->save();
            $employee_id = $filename_change->id;

            $qualification = implode(',',$request->qualification);
            $yop = implode(',',$request->yop);
            $collegename = implode(',',$request->collegename);
            $input2 = array(
                'qualification'=>$qualification,
                'yop'=>$yop,
                'collegename'=> $collegename,
                'employee_id'=>$employee_id,
            );
        
            Qualification::create($input2);


            $experiance = implode(',',$request->experiance);
            $years = implode(',',$request->years);
            $jobtitle = implode(',',$request->jobtitle);
            $input3 = array(
                'experiance'=>$experiance,
                'years'=>$years,
                'jobtitle'=>$jobtitle,
                'employee_id'=>$employee_id,
            );
            Experiance::create($input3);

        
            $input4=array(
                'destination'=>$request->destination,
                'salaryexpected'=>$request->salaryexpected,
                'employee_id'=>$employee_id,
            );
            // dd($input4);
            Destination::create($input4);
            return redirect('/');
            
        }
   public function edit($id)
        {
            $employee = Employee::leftjoin('qualifications','qualifications.employee_id','=','employees.id')
                        ->leftjoin('experiances','experiances.employee_id','=','employees.id')
                        ->leftjoin('destinations','destinations.employee_id','=','employees.id')
                        ->find($id);
            return  view('employee.edit')->with('employee',$employee);
        }
    public function update(Request $request,$id)
        {
        if($request->file('image')!=null)
            {
            $input = $request->all();
            $filename= date('YmdHi').$request->file('image')->getClientOriginalName();
            $input['image']-> move(('public/assets/photos/'), $filename);
            $filename_change=Employee::find($id);
            $filename_change['image'] = $filename;
            $filename_change ->save();

        
            $qualification = implode(',',$request->qualification);
            $yop = implode(',',$request->yop);
            $collegename = implode(',',$request->collegename);
            $input2 = array(
                'qualification'=>$qualification,
                'yop'=>$request->$yop,
                'collegename'=>$collegename,
            );
            $qualification_update = Qualification::find($request->qua_id);
            $qualification_update->update($input2);
        
            $experiance = implode(',',$request->experiance);
            $years = implode(',',$request->years);
            $jobtitle = implode(',',$request->jobtitle);
            $input3 = array(
                'experiance'=>$experiance,
                'years'=>$years,
                'jobtitle'=>$jobtitle,
            );
            $experiance_update = Experiance::find($request->exp_id);
            $experiance_update->update($input3);

            $input4=array(
                'destination'=>$request->destination,
                'salaryexpected'=>$request->salaryexpected,
            );
            $destination_update = Destination::find($request->des_id);
            $destination_update->update($input4);

             return redirect('/');
            }
        else
        {
            $input = $request->all();
            $employee_update=Employee::find($id);
            $employee_update->update($input);

            $qualification = implode(',',$request->qualification);
            $yop = implode(',',$request->yop);
            $collegename = implode(',',$request->collegename);
            $input2 = array(
                'qualification'=>$qualification,
                'yop'=>$yop,
                'collegename'=>$collegename,
            );
            $qualification_update = Qualification::find($request->qua_id);
            $qualification_update->update($input2);
        
            $experiance = implode(',',$request->experiance);
            $years = implode(',',$request->years);
            $jobtitle = implode(',',$request->jobtitle);
            $input3 = array(
                'experiance'=>$experiance,
                'years'=>$years,
                'jobtitle'=>$jobtitle,
            );
            $experiance_update = Experiance::find($request->exp_id);
            $experiance_update->update($input3);
        
            $input4=array(
                'destination'=>$request->destination,
                'salaryexpected'=>$request->salaryexpected,
            );
            $destination_update = Destination::find($request->des_id);
            $destination_update->update($input4);
    
            return redirect('/');
        }
    }
    public function delete($id,$q_id,$e_id, $d_id)
        {
            Employee::destroy($id);
            Qualification::destroy($q_id);
            Experiance::destroy($e_id);
            Destination::destroy($d_id);
            
            return redirect('/');

        }
    public function PDF()
    {

                $filename='hello_world.pdf';
                $pdf=new TCPDF;
                $pdf::Addpage();
                $pdf::setJPEGQuality(75);
                
        
                $employee = Employee::leftjoin('qualifications','qualifications.employee_id','=','employees.id')
                            ->leftjoin('experiances','experiances.employee_id','=','employees.id')
                            ->leftjoin('destinations','destinations.employee_id','=','employees.id')
                            ->get();
                $pdf::Cell(180,8,'Employee list',0,1,'C','',0);
                $pdf::SetFont('', '', 8, '', false);
                $pdf::Cell(15,8,'name',1,0,'C','',0);
                $pdf::Cell(20,8,'gender',1,0,'C','',0);
                $pdf::Cell(18,8, 'dob',1,0,'C','',0);
                $pdf::Cell(15,8,'fathername',1,0,'C','',0);
                $pdf::Cell(15,8,'address',1,0,'C','',0);
                $pdf::Cell(40,8,'email',1,0,'C','',0);
                $pdf::Cell(24,8,'phonenumber',1,0,'C','',0);
                $pdf::Cell(20,8,'qualification',1,0,'C','',0);
                foreach($employee as $row) {
                    
                    $pdf::Cell(15,8,$row['name'],1,0,'C','',0);
                    $pdf::Cell(20,8,$row['gender'],1,0,'C','',0);
                    $pdf::Cell(18,8,$row['dob'],1,0,'C','',0);
                    $pdf::Cell(15,8,$row['fathername'],1,0,'C','',0);
                    $pdf::Cell(15,8,$row['address'],1,0,'C','',0);
                    $pdf::Cell(40,8,$row['email'],1,0,'C','',0);
                    $pdf::Cell(24,8,$row['phonenumber'],1,0,'C','',0);
                    $pdf::Cell(20,8,$row['qualification'],1,0,'C','',0);
                }
                $pdf::Output(Public_path($filename),'I');
        
        
                return response()->download(Public_path($filename));
                
            }
            public function chart()
            {
                $chart_data = EmployeeMark::all();
                $avg = EmployeeMark::avg('mark1');
                $avg2 = EmployeeMark::avg('mark2');
                $avg3 = EmployeeMark::avg('mark3');
                $avg4 = EmployeeMark::avg('mark4');
                $avg5 = EmployeeMark::avg('mark5');
                $p1 = EmployeeMark::avg('pratical_mark1');
                $p2 = EmployeeMark::avg('pratical_mark2');
                $p3 = EmployeeMark::avg('pratical_mark3');
                // dd($avg);
                return view('chart.index')->with(['chart_data'=>$chart_data,'avg'=>$avg,'avg2'=>$avg2,'avg3'=>$avg3,'avg4'=>$avg4,'avg5'=>$avg5,'p1'=>$p1,'p2'=>$p2,'p3'=>$p3]);
            }
        
}

