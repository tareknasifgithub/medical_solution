<?php include('user_header.php')?>
<?php
include('../db_connect.php');
if(isset($_POST['date'])){
  $post_date = $_POST['date']; 
  $date = date_create($post_date);
$date = $date->format('Y-m-d');
$date_show = "For ".$date;
$condition = "AND user_schedule_table.date = '$date'";
}
else 
  {$condition = '';
$date_show = '';
}
//echo $_SESSION['msg'];
$user_id =  $_SESSION['user_id'];
//echo $user_id;
$sql = "SELECT `user_id`, `date`,user_info.name as user_name, diagnostic_info.name as diagnostic_name, `trxid`, `cost`,user_diag_schedule_table.serial_no, `diagnostic_id`, user_diag_schedule_table.`status`
 FROM `user_diag_schedule_table`
 inner join user_info ON user_diag_schedule_table.user_id = user_info.id
 inner join diagnostic_info ON user_diag_schedule_table.diagnostic_id = diagnostic_info.id 
 WHERE user_id = $user_id
 $condition
 order by date DESC";
 //echo $sql;

$result = mysqli_query($conn,$sql);
 $appointment_array = array();
                if($result){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { 
           array_push($appointment_array, $row);
           
          }} ?>
 <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <form action="diagnostic_appointment_status.php" method="post"> 
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
        
       <?php 
  if(isset($_SESSION['msg'])) { ?>
     <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php echo $_SESSION['msg'];
             ?>
      </div>
<?php unset($_SESSION['msg']); } ?>



<div class="box">
            <div class="box-header">
              <h3 class="box-title">Appointment List <?php echo $date_show;?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align: center">
                <thead>
                <tr style="background-color: #3c8dbc;color: #fff">
                  <th>Date</th>
                  <th>Serial</th>
                  <th>Diagnostic Name</th>
                  <th>Transaction ID</th>
                  <th>Cost</th>                  
                  <th>Status</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php foreach($appointment_array as $aa){?>
                <tr>
                  <td><?php echo $aa['date'];?></td>
                  <td><?php echo $aa['serial_no'];?></td>
                  <td><?php echo $aa['diagnostic_name'];?></td>
                  <td><?php echo $aa['trxid'];?></td>
                  <td><?php echo $aa['cost'];?></td>

                  
                  <?php if( $aa['status'] == 0){?>
                  <td><label  class = "btn btn-warning">Pending</label></td>
                  <?php } ?>
                  <?php if( $aa['status'] == 1){?>
                  <td><label  class = "btn btn-info">Approved</label></td>
                  <?php } ?>
                  <?php if( $aa['status'] == 2){?>
                  <td><label  class = "btn btn-danger">Rejected</label></td>
                  <?php } ?>
                  <?php if( $aa['status'] == 3){?>
                  <td><label  class = "btn btn-success"> Visited</label></td>
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
