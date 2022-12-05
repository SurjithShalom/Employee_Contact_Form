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
                  <form action="{{url('employee/store')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                    <div class="row">
                      <div class="col-md-4">
      
                        <div class="form-outline">
                            <label class="form-label" for="firstName">Name</label>
                            @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                          <input type="text" name="name" class="form-control " value="{{old('name')}}"/>
                          
                        </div>
      
                      </div>
                      <div class="col-md-4">
      
                        <div class="form-outline">
                            <label class="form-label" for="lastName">Gender</label>
                            @if ($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                            <div>
                                <input  type="radio" name="gender" value="Male" @if(old('gender')=='Male') selected @endif>
                                 Male
                                <input  type="radio" name="gender" value="Female" @if(old('gender')=='Female') selected @endif>
                                  Female
                                </div>
                        </div>
      
                      </div>
                    
                    <div class="col-md-4">
                        <div class="form-outline">
                            <label class="form-label" for="lastName">Date of birth</label>
                            @if ($errors->has('dob'))
                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                @endif
                          <input type="date"name="dob" class="form-control " value="{{old('dob')}}" />
                          
                        </div>
      
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
        
                          <div class="form-outline">
                            <label class="form-label" for="firstName">Fathername</label>
                            @if ($errors->has('fathername'))
                    <span class="text-danger">{{ $errors->first('fathername') }}</span>
                @endif

                            <input type="text" name="fathername" class="form-control " value="{{old('fathername')}}"/>
                          </div>
        
                        </div>
                        <div class="col-md-4">
        
                          <div class="form-outline">
                            <label class="form-label" for="lastName">Address</label>
                            @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                            <input type="text" name="address" class="form-control " value="{{old('address')}}"/>
                          </div>
        
                        </div>
                        <div class="col-md-4">
        
                            <div class="form-outline">
                              <label class="form-label" for="lastName">Image</label>
                              @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                              <input type="file" name="image" class="form-control" value="{{old('image')}}"/>
                            </div>
          
                          </div>
                      
                      
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-outline">
                              <label class="form-label" for="lastName">Email</label>
                              @if ($errors->has('email'))
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                              <input type="email" name="email" class="form-control " value="{{old('email')}}"/>
                            </div>
          
                          </div>
                        <div class="col-md-4">
        
                          <div class="form-outline">
                            <label class="form-label" for="firstName">Phone number</label>
                            @if ($errors->has('phonenumber'))
                    <span class="text-danger">{{ $errors->first('phonenumber') }}</span>
                @endif
                            <input type="text" name="phonenumber" class="form-control " value="{{old('phonenumber')}}"/>
                          </div>
        
                        </div>
                       
                          <div class="col-md-4">
                            <div class="form-outline">
                               <label class="form-label  mt-4" for="lastName">Destination</label>
                              {{-- <input type="text"name="destination"class="form-control " /> --}}
                              @if ($errors->has('destination'))
                              <span class="text-danger">{{ $errors->first('destination') }}</span>
                              @endif
                              <select  class="form-control" name="destination" value="{{old('destination')}}">
                                <option selected>select</option>
                                <option value="php/laravel">PHP/Laravel </option>
                                <option value="python">Python</option>
                                <option value="react">React</option>
                                <option value="webdevelopment">Web development</option>
                                <option value="wordpress">wordpress</option>
                                <option value="uideveloper">UI developer</option>
                              </select>
                            </div>
                          
                          </div>
                          <div class="col-md-4">
                            <div class="form-outline">
                              <label class="form-label" for="lastName">Expected salary</label>
                              @if ($errors->has('salaryexpected'))
                    <span class="text-danger">{{ $errors->first('salaryexpected') }}</span>
                @endif
                              <input type="number"name="salaryexpected"class="form-control " value="{{old('salaryexpected')}}" />
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
                    <td><input type="text" name="qualification[]" id="qualification" class="form-control"></td>
                    <td><input type="month" name="yop[]" id="myop" class="form-control"></td>
                    <td><input type="text" name="collegename[]" id="collegename"
                        class="form-control"></td>
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
                        <td><input type="text" name="experiance[]" id="experiance" class="form-control"></td>
                        <td><input type="number" name="years[]" id="years" class="form-control"></td>
                        <td><input type="text" name="jobtitle[]" id="jobtitle"
                            class="form-control"></td>
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