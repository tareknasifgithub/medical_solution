 <?php include('admin_header.php');

?>
       
<div class="row">       
        <form action="save_test.php" method="post">
        <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">
        	<div class="col-md-12">
               <div class="form-group">
                  <label>Test Name:</label>
                  <input type="text" name = "test_name" class="form-control" placeholder="Name Of The Test">
                </div>
              </div>
            </div>
          </div>
        

               
      </div>
            <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">
             <div class="col-md-12">

            <div class="form-group">
                <label>Test Details:</label>
                <input type="text" name = "test_details" class="form-control" placeholder="Enter Test Details">
              </div>
               </div>
              </div>
            </div>

              

           
</div>
<div class="form-actions">
    <div class="row">
    <div class="col-md-offset-5 col-md-8">
<button type = "submit" class="btn btn-primary"> <div class="caption">
     <i class="fa fa-hand-o-up"></i> Submit </button>
</div>
</form>
      </div>
     </div>
