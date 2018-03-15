 <?php include('diagnostic_header.php');

$diagnostic_id = $_SESSION['diagnostic_id'];

?>
       
<div class="row">       
        <form action="save_test.php" method="post">
        <input type = "hidden" name = "diagnostic_id" value = "<?php echo $_SESSION['diagnostic_id']?>">
        <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">


             <?php 
                include('../db_connect.php');
                $sql = "select * from sample_test";
                $result = mysqli_query($conn,$sql);
                ?>
        <div class="col-md-12">
              <div class="form-group">
                <label>Select Test:</label>
                <select class="form-control "name = "test_name" id = "test_name" data-placeholder="Select Test Name">
                    <option value = 'select'>Select Test</option>
                    <?php 
                    if($result){
                if($result->num_rows > 0){
                  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>

                    <option value = '<?php echo $row['id']; ?>'><?php echo $row['test_name']; ?></option>

                                    <?php 
                }
                   }}
                ?>
                </select>
              </div>


        	<div class="col-md-12">
               <div class="form-group">
                  <label>Test Code:</label>
                  <input type="text" name = "test_code" id = "test_code" class="form-control" readonly>
                  <input type="hidden" name = "test" id = "test" class="form-control">
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

        <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">
          <div class="col-md-12">
               <div class="form-group">
                  <label>Cost:</label>
                  <input type="text" name = "cost" class="form-control" placeholder="Cost Of The Test">
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
                  <label>Duration Per Test:</label>
                  <input type="text" name = "duration_per_test" class="form-control" placeholder="Duration Per Test">
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
                  <label>Commision:</label>
                  <input type="text" name = "commission" class="form-control" placeholder="Total Commision">
           </div>
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


 <?php include('diagnostic_footer.php')?>

 <script type="text/javascript">


  $(document).ready(function() {
  $("#test_name").change(function(){
    var test_code = $('#test_name').val().trim();
    var test = $("#test_name option:selected").text().trim();
	//alert(test);
            //verification_code = $('#verification_code').val().trim();
           if($('#test_name').val().trim() == "select"){
            return false;
           }
           else{
            $('#test_code').val(test_code);
            $('#test').val(test);
           }

      });  
      });  
  </script>
  