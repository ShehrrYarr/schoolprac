<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDIT Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

    <h1>This is the Edit  student Form</h1>

   

<div class="card " style="margin-left: 100px; margin-right: 100px;" >
  <div class="card-body">


  <form method="post" action="{{route('updateStudent')}}" >

    @csrf


  <div class="form-group">
    <label for="name">Student Name</label>
    <input type="text" class="form-control" value="{{$student->id}}" name="id" readonly style="display: none;">

    <input type="text" class="form-control" value="{{$student->name}}" name="name" placeholder="Enter Student Name">
  </div>
  <div class="form-group">
    <label for="parent_name">Parent Name</label>
    <input type="text" class="form-control" value="{{$student->parent_name}}" name="parent_name" placeholder="Enter Parent Name">
  </div>
  <div class="form-group">
    <label for="p_mobile_no">Parent Mobile No.</label>
    <input type="text" class="form-control" value="{{$student->p_mobile_no}}" name="p_mobile_no" placeholder="Enter Parent Mobile Number">
  </div>
  <div class="form-group">
    <label for="class">Class</label>
    <input type="text" class="form-control" value="{{$student->class}}" name="class" placeholder="Enter Student Class">
  </div>
  <div class="form-group">
    <label for="subjects">Subjects</label>
    <input type="text" class="form-control" value="{{$student->subjects}}" name="subjects" placeholder="Enter Student subjects">
  </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>

{{-- <a href="\showallstudents"><h1>Click here to view all students</h1></a> --}}
    
</body>
</html>