<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{{asset('tiny/tinymce.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('tiny/jquery.tinymce.min.js')}}"></script>

<body>
    <div id="app">
        
            <div class="container">
               

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
