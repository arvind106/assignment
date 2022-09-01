 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">

            <div class="alert alert-danger print-error-msg alert-dismissible" style="display:none">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> 
              <ul></ul>
            </div>

                

          <input type="hidden" name="updateId" id="updateId">
            <div class="form-group">
            <label for="Sapid">Sapid:</label>
            <input type="text" name="Sapid" class="form-control" id="Sapid">
           </div>

            <div class="form-group">
            <label for="Hostname">Hostname:</label>
            <input type="text" name="Hostname" class="form-control" id="Hostname">
           </div>

           <div class="form-group">
            <label for="Loopback">Loopback:</label>
            <input type="text" name="Loopback" class="form-control" id="Loopback">
           </div>

            <div class="form-group">
            <label for="MacAddress">MacAddress:</label>
            <input type="text" name="MacAddress" class="form-control" id="MacAddress">
           </div>

            
         

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success update">Save</button>
        </div>
      </div>
      
    </div>
  </div>

 </div>
</div>
<div class="footer">
  <!-- <p>Footer</p> -->
</div>
</body>
</html>