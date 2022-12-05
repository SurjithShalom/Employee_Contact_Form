<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            width: 95%;
            padding:20px;
        }
        th{
            color: brown;
            background-color: bisque;
            
        }
        td{
            color:rgb(12, 64, 68);
            background-color: rgb(200, 243, 222);
        }
    </style>
</head>
<body>
    <div class="container">
 <div class="table table-striped table-hover">
    <table class="table table-bordered card-head" >
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th >DOB</th>
                <th>Fathername</th>
                <th>gender</th>
                <th>Country</th>
                <th>State</th>
                <th>Image</th>               
            </tr>
        </thead>
        @php
        $i=1;

        @endphp
        <tbody class="card-body">
            @foreach($items as $view)
            <tr>
            <td>{{$i++}}</td>
            <td>{{$view->name}}</td>
            <td>{{$view->dob}}</td>
            <td>{{$view->fathername}}</td>
            <td>{{$view->gender}}</td>
            {{-- <td>{{$view->country}}</td>
            <td>{{$view->state}}</td> --}}
            <td><img src="public/assets/photos/{{ $view->image}}" width="50"height="50"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>

</body>
</html>