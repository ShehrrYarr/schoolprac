@extends('nav_bar')
@section('content')


<h1>Hi this is welcome page</h1>
<h1>Main page </h1>
    <a href="/addstudent"><h1>Click Here to add students</h1></a>

<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  Launch Modal
</button><br>

    <a href="/addsubjectPaeg"><h1>Click Here to add Subjects</h1></a>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Your content here...
      </div>
      <div class="modal-footer form-actions">
         <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Save
                        </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>













@endsection