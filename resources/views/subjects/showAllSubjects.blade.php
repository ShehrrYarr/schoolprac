<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Subjects</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<body>

 

<!--Edit Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Subject</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('updateSubject')}}">

    @csrf


  <div class="form-group">
    <label for="name">Subject Name</label>
    <input type="text" class="form-control" id="id" name="id" hidden>

    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Subject Name">
  </div>
 
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
     
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($subjects as $subject )
    <tr>
        <td>{{$subject->id}}</td>
        <td>{{$subject->created_at}}</td>
        <td>{{$subject->name}}</td>
        
        <td><a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="getsbj({{ $subject->id }})" >EDIT</a> | <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deletefn({{ $subject->id }})">Delete</a></td>
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
  function getsbj(id) {
        console.log(id);
        // var id = value;
        $.ajax({
        type: "GET",
        url: '/getsbjid/' + id,
        success: function (data) {
        $("#myModal").trigger("reset");
        // console.log(data.result);
        
        $('#id').val(data.result.id);
        $('#name').val(data.result.name);
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
    
</body>
</html>