<?php include('admin_header.php')?>
<?php
include('../db_connect.php');
if($_POST){
  $post_date = $_POST['date']; 
  $date = date_create($post_date);
$date = $date->format('Y-m-d');
}
else $date = date("Y-m-d");
//$doctor_id =  $_SESSION['doctor_id'];
$sql = "SELECT
user_info.id,
user_info.`name`,
user_info.age,
user_info.gender,
user_info.contact,
diagnostic_info.name as diagnostic_name,
user_diag_schedule_table.id as schedule_id,
user_diag_schedule_table.date,
user_diag_schedule_table.start_time,
user_diag_schedule_table.end_time,
user_diag_schedule_table.status
FROM
user_diag_schedule_table
INNER JOIN user_info ON user_diag_schedule_table.user_id = user_info.id
INNER JOIN diagnostic_info ON user_diag_schedule_table.diagnostic_id = diagnostic_info.id
ORDER BY user_diag_schedule_table.date DESC";

$result = mysqli_query($conn,$sql);
 $appointment_array = array();
                if($result){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { 

           array_push($appointment_array, $row);
           
          }} ?>
 <div class="box-body">
          <div class="row">
            
        

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Appointment List </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align: center">
                <thead>
                <tr style="background-color: #3c8dbc;color: #fff">
                  <th>User Name</th>
                  <th>Doctor Name</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Status</th>                   
                  
                </tr>
                </thead>
                <tbody>
                  <?php foreach($appointment_array as $aa){?>
                <tr>
                  <td><?php echo $aa['name'];?></td>                  
                  <td><?php echo $aa['diagnostic_name'];?></td>
                  <td><?php echo $aa['date'];?></td>                  
                  <td><?php echo $aa['start_time'];?></td> 

                  <?php if( $aa['status'] == 0){?>
                 <td> <a href="diag_appoinment_accept.php?schedule=<?php echo $aa['schedule_id'];?>&stts=1" <i class = "fa fa-check-circle" title="Accept" style="font-size: 30px;"></i></a>

                 <a href="diag_appoinment_accept.php?schedule=<?php echo $aa['schedule_id'];?>&stts=2" <i class = "fa fa-times-circle-o" title="Reject" style="font-size: 30px;"></i></a></td>
                  <?php } ?>
                  <?php if( $aa['status'] == 1){?>
                  <td><label  class = "btn btn-info">Accepted</label></td>
                  <?php } ?>
                  <?php if( $aa['status'] == 2){?>
                  <td><label  class = "btn btn-danger">Rejected</label></td>
                  <?php } ?>                
                  <?php if( $aa['status'] == 3){?>
                  <td><label  class = "btn btn-success">Dr. Visited</label></td>
                  <?php } ?> 
                  
                  

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
      'searching'   : true,
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