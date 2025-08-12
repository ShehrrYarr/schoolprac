@extends('nav_bar')
@section('content')





 <h1>This is the student Form</h1>

   

<div class="card " style="margin-left: 100px; margin-right: 100px;" >
  <div class="card-body">


  <form method="post" action="{{route('storeStudent')}}">

    @csrf


  <div class="form-group">
    <label for="name">Student Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Student Name">
  </div>
  <div class="form-group">
    <label for="parent_name">Parent Name</label>
    <input type="text" class="form-control" name="parent_name" placeholder="Enter Parent Name">
  </div>
  <div class="form-group">
    <label for="p_mobile_no">Parent Mobile No.</label>
    <input type="number" class="form-control" name="p_mobile_no" placeholder="Enter Parent Mobile Number" maxlength="10">
  </div>
  <div class="form-group">
    <label for="class">Class</label>
    <input type="text" class="form-control" name="class" placeholder="Enter Student Class">
  </div>
  <div class="form-group">
    <label for="subjects">Subjects</label>
    <select class="form-control" name="subject_id">
      <option value="">----Select a Subject----</option>
      @foreach($subjects as $subject)
      <option value="{{$subject->id}}">{{$subject->name}}</option>
@endforeach

    </select>
  </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>

<a href="\showallstudents"><h1>Click here to view all students</h1></a>





@endsection