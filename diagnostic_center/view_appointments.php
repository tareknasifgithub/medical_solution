<?php include('diagnostic_header.php')?>
<?php
include('../db_connect.php');
if($_POST){
  $post_date = $_POST['date']; 
  $date = date_create($post_date);
$date = $date->format('Y-m-d');
$condition = "WHERE user_diag_schedule_table.date = '$date' AND";
}
else $condition = "";
//$doctor_id =  $_SESSION['doctor_id'];
$diagnostic_id = $_SESSION['diagnostic_id'];
$sql = "SELECT
user_info.id,
user_info.`name`,
user_info.age,
user_info.gender,
user_info.contact,
user_diag_schedule_table.id schedule_id,
user_diag_schedule_table.date,
user_diag_schedule_table.start_time,
user_diag_schedule_table.end_time
FROM
user_diag_schedule_table
LEFT JOIN user_info ON user_diag_schedule_table.user_id = user_info.id
WHERE
$condition
 user_diag_schedule_table.diagnostic_id = $diagnostic_id";
//echo $sql; exit;
$result = mysqli_query($conn,$sql);
 $appointment_array = array();
                if($result->num_rows > 0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { 

           $d=strtotime($row['start_time']);
   $time =  date("h:i", $d);
           array_push($appointment_array, $row);
           
          }} ?>
 <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <form action="view_appointments.php" method="post"> 
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date" class="form-control pull-right" id="datepicker">
                </div>

              </div>


            </div>
                               
                 <button type="submit" class = "btn btn-success">View</button>               
            </form>
          </div>
        </div>

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Appointment List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Gender(s)</th>
                  <th>Contact</th>
                  <th>Date</th>
                  <th>Time</th>                  
                  <th>Upload Result</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($appointment_array as $aa){?>
                <tr>
                  <td><?php echo $aa['name'];?></td>
                  <td><?php echo $aa['age'];?></td>
                  <td><?php echo $aa['gender'];?></td>
                  <td><?php echo $aa['contact'];?></td>
                  <td><?php echo $aa['date'];?></td>                  
                  <td><?php echo $aa['start_time'];?></td>
                  
                  <form action="upload_test_result.php" method="post">
                    <input type="hidden" name="user_id" value= "<?php echo $aa['id'];?>">
                    <input type="hidden" name="schedule_id" value="<?php echo $aa['schedule_id'];?>">
                  <td><button type="submit" class = "btn btn-success">Upload</button></td>
                  </form>
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
