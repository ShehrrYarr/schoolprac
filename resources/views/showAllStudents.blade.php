@extends('nav_bar')
@section('content')



<!--Edit Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('updateStudent')}}">

    @csrf


  <div class="form-group">
    <label for="name">Student Name</label>
    <input type="text" class="form-control" id="id" name="id" hidden>

    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Student Name">
  </div>
  <div class="form-group">
    <label for="parent_name">Parent Name</label>
    <input type="text" class="form-control" id="parent_name" name="parent_name" placeholder="Enter Parent Name">
  </div>
  <div class="form-group">
    <label for="p_mobile_no">Parent Mobile No.</label>
    <input type="number" class="form-control" id="p_mobile_no" name="p_mobile_no" placeholder="Enter Parent Mobile Number" maxlength="10">
  </div>
  <div class="form-group">
    <label for="class">Class</label>
    <input type="text" class="form-control" id="class" name="class" placeholder="Enter Student Class">
  </div>
  <div class="form-group">
    <label for="subjects">Subjects</label>
    <select class="form-control" id="subject_id" name="subject_id">
      <option value="">----Select a Subject----</option>
      @foreach($subjects as $subject)
      <option value="{{$subject->id}}">{{$subject->name}}</option>
@endforeach

    </select>
  </div>
   {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
   <div class="modal-footer form-actions">
         <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Save
                        </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>


       </form>
      </div>
      
    </div>
  </div>
</div>

<!--Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to Delete this Student </h5> --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="get" action="{{route('deleteStudent')}}">

    @csrf


  <div class="form-group">
    <label for="name">Are you sure that you want to delete this student?</label>
    <input type="text" class="form-control" id="did" name="id" hidden>

    <input type="text" class="form-control" id="dname" name="name" placeholder="Enter Student Name">
  </div>

  </div>
   {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
   <div class="modal-footer form-actions">
         <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Delete
                        </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>


       </form>
      </div>
      
    </div>
  </div>
</div>


@if (session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
            @endif

            @if (session('danger'))
            <div class="alert alert-danger" id="dangerMessage" style="color: red;">
                {{ session('danger') }}
            </div>
            @endif
    <div class="card " style="margin-left: 100px; margin-right: 100px;" >
  <div class="card-body">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Created At</th>
      <th scope="col">Name</th>
      <th scope="col">Parent Name</th>
      <th scope="col">Mobile No.</th>
      <th scope="col">Class</th>
      <th scope="col">Subjects</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($students as $student )
    <tr>
        <td>{{$student->id}}</td>
        <td>{{$student->created_at}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->parent_name}}</td>
        <td>{{$student->p_mobile_no}}</td>
        <td>{{$student->class}}</td>
        <td>{{$student->subject->name}}</td>
        <td><a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="edit({{ $student->id }})" >EDIT</a> | <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deletefn({{ $student->id }})">Delete</a></td>
    </tr>
   
        
    @endforeach
  </tbody>
</table>
    </div>
</div>

<a href="/addstudent">Click here to add students</a>

<!-- Button trigger modal -->

<!-- Modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function edit(value) {
        console.log(value);
        var id = value;
        $.ajax({
        type: "GET",
        url: '/studentedit/' + id,
        success: function (data) {
        $("#myModal").trigger("reset");
        console.log(data.result);
        
        $('#id').val(data.result.id);
        $('#name').val(data.result.name);
        $('#parent_name').val(data.result.parent_name);
        $('#p_mobile_no').val(data.result.p_mobile_no);
        $('#class').val(data.result.class);
        $('#subject_id').val(data.result.subject.id);
        
       
        
        },
        error: function (error) {
        console.log('Error:', error);
        }
        });
        }
  function deletefn(value) {
        console.log(value);
        var id = value;
        $.ajax({
        type: "GET",
        url: '/studentedit/' + id,
        success: function (data) {
        $("#myModal").trigger("reset");
        console.log(data.result);
        
        $('#did').val(data.result.id);
        $('#dname').val(data.result.name);
       
        
       
        
        },
        error: function (error) {
        console.log('Error:', error);
        }
        });
        }
       
</script>








@endsection