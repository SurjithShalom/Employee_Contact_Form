<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
      a.btn:hover {
     -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);
 }
 a.btn {
     -webkit-transform: scale(0.8);
     -moz-transform: scale(0.8);
     -o-transform: scale(0.8);
     -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
     -o-transition-duration: 0.5s;
 }
    </style>
</head>
<body>
    <div>
      <h3>Employee Details</h3>
    </div>
        
          <a href="{{url('employee/create')}}" class="btn btn-success"  >Add</a>
          <a href="{{'employee/pdf'}}" class="btn btn-success"  >PDF</a>
          <div class="container-fluid" style="width:500px;margin-left:-2px ">
          <form action="{{('file-import')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($errors->has('csvfile'))
                    <span class="text-danger">{{ $errors->first('csvfile') }}</span>
                @endif
            <input type="file" name="csvfile" class="form-control" >
          <input type="submit" value="Import CSV"  class="btn btn-success mt-2">
        </form>
        <div style="margin-left:120px;margin-top:-41px;">
        <a href="{{('file-export')}}"  class="btn btn-success mt-2">Export CSV</a>
        <a href="{{('file-pdf')}}"  class="btn btn-success mt-2">Export PDF</a>
        <a href="{{url('chart')}}"  class="btn btn-success mt-2">View Chart</a>
      </div>
        </div>
  
    <div class="container-fluid">
     
    <div class="table-responsive">
        <table class="table table-bordered border-primary">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Gender</th>
              <th scope="col">DOB</th>
              <th scope="col">Fathername</th>
              <th scope="col">Adderss</th>
              <th scope="col">Image</th> 
              <th scope="col">Email Id</th>
              <th scope="col">Number</th>
              <th scope="col">Qualification</th>
              <th scope="col">Year of passing</th>
              <th scope="col">College Name</th>
              <th scope="col">Experiance</th>
              <th scope="col">No of years</th>
              <th scope="col">Job title</th>
              <th scope="col">Destination</th>
              <th scope="col">Salary Expected</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>

            </tr>
          </thead>
          <tbody>
            @php
            $i=1
            @endphp
            <tr>
              @foreach($employee as $value)
                <td scope="row">{{$i++}}</td>
                <td>{{$value->name}}<small>({{$value->destination}})</small></td>
                <td>{{$value->gender}}</td>
                <td>{{$value->dob}}</td>
                <td>{{$value->fathername}}</td>
                <td>{{$value->address}}</td>
                <td><img src="public/assets/photos/{{ $value->image}}" width="50"height="50"></td>
                <td>{{$value->email}}</td>
                <td>{{$value->phonenumber}}</td>
                <td>{{$value->qualification}}</td>
                <td>{{$value->yop}}</td>
                <td>{{$value->collegename}}</td>
                <td>{{$value->experiance}}</td>
                <td>{{$value->years}}</td>
                <td>{{$value->jobtitle}}</td>
                <td>{{$value->destination}}</td>
                <td>{{$value->salaryexpected}}</td>
               <td> <a href="{{url('/employee/edit/'.$value->id)}}?e={{$value->q_id}}?f={{$value->e_id}}?g={{$value->d_id}}" class="btn btn-success">Edit</a></td>        
               <td> <a href="{{url('/employee/delete/'.$value->id . '/' . $value->q_id.  '/' . $value->e_id .  '/' . $value->d_id)}}" class="btn btn-success">Delete</a></td>        
            </tr>
            @endforeach
          </tbody>
        </table>
      </div> 
      </div>
</body>
</html>
