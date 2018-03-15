<?php include('admin_header.php')?>
<?php
include('../db_connect.php');
if($_POST){
  $post_date = $_POST['date']; 
  $date = date_create($post_date);
$date = $date->format('Y-m-d');
}
else $date = date("Y-m-d");
$doctor_id =  $_SESSION['doctor_id'];
$sql = "SELECT
user_info.id,
user_info.`name`,
user_info.`user_code`,
user_info.age,
user_info.gender,
user_info.contact,
user_schedule_table.id as schedule_id,
user_schedule_table.date,
user_schedule_table.start_time,
user_schedule_table.end_time,
user_schedule_table.status
FROM
user_schedule_table
INNER JOIN user_info ON user_schedule_table.user_id = user_info.id
WHERE user_schedule_table.date = '$date'
AND user_schedule_table.doctor_id = $doctor_id";

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
                               
                 <button type="submit" class = "btn btn-info">View</button>               
            </form>
          </div>
        </div>
        

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Appointment List For <?php echo $date;?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align: center">
                <thead>
                <tr style="background-color: #3c8dbc;color: #fff">
                  <th>Name</th>
                  <th>User Code</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Contact</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>History</th>
                  <th>Status</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php foreach($appointment_array as $aa){?>
                <tr>
                  <td><?php echo $aa['name'];?></td>
                  <td><?php echo $aa['user_code'];?></td>
                  <td><?php echo $aa['age'];?></td>
                  <td><?php echo $aa['gender'];?></td>
                  <td><?php echo $aa['contact'];?></td>
                  <td><?php echo $aa['date'];?></td>                  
                  <td><?php echo $aa['start_time'];?></td>
                  <form action="view_user_history.php" method="post">
                    <input type="hidden" name="user_id" value= "<?php echo $aa['id'];?>">
                  <td><button type="submit" class = "btn btn-info">View History</button></td>
                  </form>
                  <?php if( $aa['status'] == 2){?>
                  <td><label  class = "btn btn-success">Visited</label></td>
                  <?php } else {?>
                  <form action="pres.php" method="post">
                    <input type="hidden" name="user_id" value= "<?php echo $aa['id'];?>">
                    <input type="hidden" name="schedule_id" value= "<?php echo $aa['schedule_id'];?>">
                  <td><button type="submit" class = "btn btn-warning">Prescribe</button></td>
                  </form>
                  <?php }?>

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