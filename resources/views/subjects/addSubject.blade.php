<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

    @if (session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
            @endif

            @if (session('danger'))
            <div class="alert alert-danger" id="dangerMessage" style="color: red;">
                {{ session('danger') }}
            </div>
            @endif=

    <h1>This is the Subjct Form</h1>

   

<div class="card " style="margin-left: 100px; margin-right: 100px;" >
  <div class="card-body">


  <form method="post" action="{{route('storeSubject')}}">

    @csrf


  <div class="form-group">
    <label for="name">Enter Subject Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Subject Name">
  </div>
  

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>

<a href="\showallsubjects"><h1>Click here to view all Subjects</h1></a>
    
</body>
</html>