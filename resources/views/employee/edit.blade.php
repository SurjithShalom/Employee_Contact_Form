<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
          <div class="container">
              
             
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                  <form action="{{url('employee/update/'.$employee->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="qua_id" value="{{$employee->q_id}}">
                        <input type="hidden" name="exp_id" value="{{$employee->e_id}}">
                        <input type="hidden" name="des_id" value="{{$employee->d_id}}">
                    <div class="row">
                      <div class="col-md-4">
      
                        <div class="form-outline">
                            <label class="form-label" for="firstName">Name</label>
                          <input type="text" name="name" class="form-control " style="width:200px;" value="{{$employee->name}}"><small>({{$employee->destination}})</small>
                        
                        </div>
      
                      </div>
                      <div class="col-md-4">
      
                        <div class="form-outline">
                            <label class="form-label" for="lastName">Gender</label>
                            <div>
                                <input  type="radio" name="gender" value="Male"  @checked($employee->gender=='Male') >
                                 Male
                                <input  type="radio" name="gender" value="Female" @checked($employee->gender=='Female') >
                                  Female
                                </div>
                        </div>
      
                      </div>
                    
                    <div class="col-md-4">
                        <div class="form-outline">
                            <label class="form-label" for="lastName">Date of birth</label>
                          <input type="date"name="dob" class="form-control " value="{{$employee->dob}}" />
                          
                        </div>
      
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
        
                          <div class="form-outline">
                            <label class="form-label" for="firstName">Fathername</label>

                            <input type="text" name="fathername" class="form-control " value="{{$employee->fathername}}"/>
                          </div>
        
                        </div>
                        <div class="col-md-4">
        
                          <div class="form-outline">
                            <label class="form-label" for="lastName">Address</label>

                            <input type="text" name="address" class="form-control " value="{{$employee->address}}"/>
                          </div>
        
                        </div>
                        <div class="col-md-4">
        
                            <div class="form-outline">
                              <label class="form-label" for="lastName">Image</label>
                              <input type="file" name="image" class="form-control" value="{{$employee->image}}"/>
                            </div>
          
                          </div>
                      
                      
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-outline">
                              <label class="form-label" for="lastName">Email</label>
  
                              <input type="email" name="email" class="form-control " value="{{$employee->email}}" />
                            </div>
          
                          </div>
                        <div class="col-md-4">
        
                          <div class="form-outline">
                            <label class="form-label" for="firstName">Phone number</label>

                            <input type="text" name="phonenumber" class="form-control " value="{{$employee->phonenumber}}" />
                          </div>
        
                        </div>
                        <div class="col-md-4">
                          <div class="form-outline">
                            <label class="form-label" for="lastName">Destination</label>
                            <input type="text"name="destination"class="form-control " value="{{$employee->destination}}"/>
                          </div>
                        
                        </div>
                        <div class="col-md-4">
                          <div class="form-outline">
                            <label class="form-label" for="lastName">Expected salary</label>
                            <input type="number"name="salaryexpected"class="form-control " value="{{$employee->salaryexpected}}" />
                          </div>
                        </div>
                   <div class="col-md-12 mt-4">
                <table class="table table-bordered" >
                  <thead>
              <tr>

                  <th>Qualification</th>
                  <th>YearOfPassing</th>
                  <th>NameOfUniversity</th>
                 
              </tr>
          </thead>
          <tbody id="tableappend1">
              <tr>
              <td>
                <?php $qualification = explode(',',$employee->qualification);$yearofpassing = explode(',',$employee->yop);$college = explode(',',$employee->collegename);?>
                @foreach ($qualification as $qualifications)
                <input type="text" name="qualification[]" id="qualification" class="form-control mb-1" value="{{$qualifications}}"><hr>
                @endforeach
            </td>
              <td>
                @foreach($yearofpassing as $yop)
                <input type="month" name="yop[]" id="yop" class="form-control mb-1" value="{{$yop}}">
                <hr>
                @endforeach
            </td>
              <td>
                @foreach($college as $collegename)
                <input type="text" name="collegename[]" id="collegename" class="form-control mb-1" value="{{$collegename}}">
                 
                  <hr>
                  @endforeach
                </td>
                 
          </tr>
          </tbody>
          
          </table>
                  <p id="btn1"><u> Add more</u></p>
                   </div>

                   <div class="col-md-12 mt-4">
                    <table class="table table-bordered" >
                      <thead>
                  <tr>
  
                      <th>Experiance</th>
                      <th>No of Years</th>
                      <th>Job title</th>
                     
                  </tr>
              </thead>
              <tbody id="tableappend2">
                  <tr>
                    <td>
                      <?php $experiance = explode(',',$employee->experiance);$years = explode(',',$employee->years);$jobtitle = explode(',',$employee->jobtitle);?>
                      @foreach ($experiance as $experiances)
                      <input type="text" name="experiance[]" id="experiance" class="form-control mb-1" value="{{$experiances}}"><hr>
                      @endforeach
                  </td>
                    <td>
                      @foreach($years as $nofoyears)
                      {{-- <select name="years[]" id="years[]" class="form-control">
                        <option value="{{$nofoyears}}">{{$nofoyears}}</option>
                      </select> --}}
                      <input type="number" name="years[]" id="years" class="form-control mb-1" value="{{$nofoyears}}">
                      <hr>
                      @endforeach
                  </td>
                    <td>
                      @foreach($jobtitle as $jobtitles)
                      <input type="text" name="jobtitle[]" id="jobtitle"class="form-control mb-1" value="{{$jobtitles}}">
                        
                        <hr>
                        @endforeach
                      </td>
                       
                </tr>
              </tbody>
              
              </table>
                      <p id="btn2"><u> Add more</u></p>
                       </div>
                       
                    
                       
                    </div>
                      <div class="mt-4 pt-2">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                  </div>
                </form>
              </div>
            
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  $(document).ready(function(){




    $("#btn1").click(function(){

      $("#tableappend1").append(`<tr>
    <td><input type="text" name="qualification[]"  class="form-control"></td>
    <td><input type="month" name="yop[]"  class="form-control"></td>
    <td><input type="text" name="collegename[]"  class="form-control"></td>
    <td></td> 
</tr>`);
    });

 
      $("#btn2").click(function(){

        $("#tableappend2").append(`<tr>
      <td><input type="text" name="experiance[]"  class="form-control"></td>
      <td><input type="number" name="years[]"  class="form-control"></td>
      <td><input type="text" name="jobtitle[]"  class="form-control"></td>
      <td></td> 
  </tr>`);
      });

    });
    </script>
</html>