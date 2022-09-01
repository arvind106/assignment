   @extends('layout.layout')
 
     @section('content')


    <div class="row">

       <form action="{{url('/hosts/import')}}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="col-md-4">
                 <input type="file" name="file" class="form-control">
               </div>
               <div class="col-md-5">
               <button class="btn btn-success">Import Data</button>
               <a href="{{url('/hosts/chart')}}" class="btn btn-success">Show Chart</a>
              </div>

            </form>

    </div>
    <hr>

 <div class="row">
    <div class="col-md-12">
    	<!-- <a href="{{url('/hosts/create')}}"><button type="button" class="btn btn-success">Add Router</button></a>
		<button type="button" class="btn btn-info">Import Router</button>
 -->
    
           


     <table class="table table-hove" id="Mytable">
     <thead>
      <tr>
        <th>Sapid</th>
        <th>Hostname</th>
        <th>Loopback</th>
        <th>MacAddress</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
    </tbody>
</table>

    </div>
  </div>

    <script type="text/javascript">

  $(function () {
    var table = $('#Mytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('hosts.index') }}",

        columns: [
            {data: 'Sapid', name: 'Sapid'},
            {data: 'Hostname', name: 'Hostname'},
            {data: 'Loopback', name: 'Loopback'},
            {data: 'MacAddress', name: 'MacAddress'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]

    });

$(document).on('click', '.del', function () {
                   // var id = $(this).data('delete');
                   //  alert(id);
                    Swal.fire({
                        title: 'Are you sure delete this record?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                           var url = $(this).data('remote');
                            $.ajax({
                                type: 'DELETE',
                                url: url,
                                dataType: 'json',
                                data: {"_token": "{{ csrf_token() }}",method: 'DELETE', submit: true},
                                success: function (data) {
                                    //alert(data);
                                    if (data.error == undefined) {
                                       $('#Mytable').DataTable().draw(false);
                                        Swal.fire(
                                                'Deleted!',
                                                data.success,
                                                'success'
                                                )
                                    } else {
                                        Swal.fire(
                                                'Error!',
                                                data.error,
                                                'error'
                                                )
                                    }

                                }

                            })
                        } else if (
                                result.dismiss === Swal.DismissReason.cancel
                                ) {
                            swal.fire(
                                    'Cancelled',
                                    'Your imaginary data is safe :)',
                                    'error'
                                    )
                        }
                    })

                })


              $(document).on('click', '.editrow', function () {
                var url = $(this).data('delete');
                  $.get(url, function (data) {
                  $('#Sapid').val(data.Sapid);
                  $('#Hostname').val(data.Hostname);
                  $('#MacAddress').val(data.MacAddress);
                  $('#Loopback').val(data.Loopback);
                  $('#updateId').val(data.id);
                  
                 })
              })


              $(document).on("click", ".update" , function(e) {
                 e.preventDefault();

              var id = $('#updateId').val();

              var Sapid = $('#Sapid').val();
              var Hostname = $('#Hostname').val();
              var MacAddress = $('#MacAddress').val();
              var Loopback = $('#Loopback').val();
              

              if(Sapid != '' && Hostname != '' && MacAddress != ''  && Loopback != ''){
                $.ajax({
                  url: '<?php echo url(Request::segment(1)) ?>/' + id,
                  type: 'PUT',
                  dataType: 'json',
                  data: {"_token": "{{ csrf_token() }}", id: id,Sapid: Sapid,Hostname: Hostname,MacAddress:MacAddress,Loopback:Loopback},
                  success: function(response){
                    console.log(response)
                    if (response.error == undefined) {                      
                      $("#myModal").modal("hide");
                      $('#myModal .close').click();
                      $('#Mytable').DataTable().draw(false);
                                        Swal.fire(
                                                'Success!',
                                                response.success,
                                                'success'
                                                )
                                    } else {
                                       printErrorMsg(response.error);
                                       
                                    }
                  }
                });
              }else{
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'Please fill all mandatoey fields.'
                })
              }
            });

           function printErrorMsg (msg) {

            $(".print-error-msg").find("ul").html('');

            $(".print-error-msg").css('display','block');

            $.each( msg, function( key, value ) {

                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

            });

        }


  });

</script>

 @endsection
 
