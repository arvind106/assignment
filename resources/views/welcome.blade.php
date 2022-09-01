<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{{asset('tiny/tinymce.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('tiny/jquery.tinymce.min.js')}}"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Smart Editor</h1>
  
</div>
  
<div class="container">
    <a href="users/create" class="btn btn-success">add</a>
  <div class="row">
    <div class="col-md-12">
      <h3>Users</h3>
      
      <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
      
       
      </tr>
    </thead>
    <tbody>


        @foreach ($data as $user)
    

      <tr>
        <td>{{$user->name}}</td>
       <td>{{$user->email}}</td>
       
      </tr>
      @endforeach
      
    </tbody>
</table>

    </div>
    
  </div>
</div>

</body>
</html>
