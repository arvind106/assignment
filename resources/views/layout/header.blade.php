<!DOCTYPE html>
<html lang="en">
<head>
  <title>Router Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.29/sweetalert2.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.29/sweetalert2.min.css" integrity="sha512-doewDSLNwoD1ZCdA1D1LXbbdNlI4uZv7vICMrzxfshHmzzyFNhajLEgH/uigrbOi8ETIftUGBkyLnbyDOU5rpA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>

.footer {
 
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #337ab7;
  color: white;
  text-align: center;
  margin-top: 50px;
  height: 40px;
}
</style>
</head>
<body>

<div class="jumbotron text-center">
  <h1>My Assignment</h1>
 
</div>
  
<div class="container">
  <div class="row">

     @if ($errors->any())

     <div class="alert alert-danger alert-dismissible print-error-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
  </div>
    
  @endif




@if(session()->has('success'))
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong>  {{ session()->get('success') }}
  </div>
@endif



@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong>  {{ session()->get('error') }}
  </div>
@endif


  
