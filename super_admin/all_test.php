<?php include('admin_header.php')?>
<?php
include('../db_connect.php');

//$doctor_id =  $_SESSION['doctor_id'];
$sql = "SELECT
*
FROM
sample_test";

$result = mysqli_query($conn,$sql);
 $appointment_array = array();
                if($result->num_rows > 0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { 

           
           array_push($appointment_array, $row);
           
          }} ?>


<div class="box">
            <div class="box-header">
              <h3 class="box-title">All Test List</h3>
            </div>
           <a href="add_test.php"> <label class = "btn btn-info pull-right">
              Add New Test
            </label></a>
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Test Code</th>
                  <th>Test Name</th>
                  <th>Test Details</th>                
                </tr>
                </thead>
                <tbody>
                  <?php foreach($appointment_array as $aa){?>
                <tr>
                  <td><?php echo $aa['id'];?></td>
                  <td><?php echo $aa['test_name'];?></td>
                  <td><?php echo $aa['test_details'];?></td>               
                </tr>            
              
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
<script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- date-range-picker -->
<script src="../asset/bower_components/moment/min/moment.min.js"></script>
<script src="../asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../asset/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });

  $(document).ready(function() {

    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
});
</script>
