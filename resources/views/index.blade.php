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
   
  <div class="row">
    <div class="col-md-12">
      <h3>Add User</h3>
      
     <form action="#" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    

    <div class="form-group col-md-12">
       <label for="email">description:</label>
                            <textarea id="description" name="description"></textarea>
                        </div>


    <button type="submit" class="btn btn-default">Submit</button>
  </form>

    </div>
    
  </div>
</div>

 <script type="text/javascript">
            tinymce.init({
                selector: '#description',
                theme: 'modern',
                height: 300,
                convert_urls : false, 
                plugins: [
                    'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                    'save table contextmenu directionality emoticons template paste textcolor'
                ],
//                content_css: 'css/content.css',
                formats: {
                    // Changes the default format for the bold button to produce a span with a bold class
                    bold: {inline: 'span', classes: 'bold'}
                },
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
                images_upload_handler: function (blobInfo, success, failure) {
                    var xhr, formData;
                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', '<?php echo url('/'); ?>/uploadimg');
                    var token = '{{ csrf_token() }}';
                    xhr.setRequestHeader("X-CSRF-Token", token);
                    xhr.onload = function () {
                        var json;
                        if (xhr.status != 200) {
                            failure('HTTP Error: ' + xhr.status);
                            return;
                        }
                        json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location != 'string') {
                            failure('Invalid JSON: ' + xhr.responseText);
                            return;
                        }
                        success(json.location);
                    };
                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                    xhr.send(formData);
                }

            });
        </script>

</body>
</html>
