
   
    @extends('layout.layout')
 
@section('content')
    <div class="col-md-12">
    	<a href="{{url('/hosts')}}"><button type="button" class="btn btn-success">Router List</button></a>
		

<hr>
<?php
                    $id = isset($result) ? '/' . $result->id : '';
                    $method = isset($result) ? 'PUT' : '';
                    ?>
                    {{ Form::open(array('url' => url(Request::segment(1)).$id,'method' => $method, 'id' =>'myForm','files'=>true)) }}


    <div class="form-group">
      <label for="Sapid">Sapid:</label>      
      {{ Form::text('Sapid',  isset($result) ? $result->Sapid : null,['class'=>'form-control', 'placeholder'=>'Sapid']) }}
    </div>

    <div class="form-group">
      <label for="Hostname">Hostname:</label>      
       {{ Form::text('Hostname',  isset($result) ? $result->Hostname : null,['class'=>'form-control', 'placeholder'=>'Hostname']) }}
    </div>

    <div class="form-group">
      <label for="Loopback">Loopback:</label>
     {{ Form::text('Loopback',  isset($result) ? $result->Loopback : null,['class'=>'form-control', 'placeholder'=>'Loopback']) }}
    </div>

    <div class="form-group">
      <label for="Mac Address">Mac Address:</label>
      {{ Form::text('MacAddress',  isset($result) ? $result->MacAddress : null,['class'=>'form-control', 'placeholder'=>'MacAddress']) }}
    </div>

    <!--  <div class="form-group">
      <label for="Hostname">Response Time:</label>
      <input type="text" class="form-control"  placeholder="Enter Response Time" name="ResponseTime">
    </div> -->
   

    <button type="submit" class="btn btn-success">Save</button>
 {{ Form::close() }}

    </div>
 @endsection