<?php include('user_header.php')?>
<?php
include('../db_connect.php');

$user_id =  $_SESSION['user_id'];
$sql = "SELECT
user_info.`name`,
doctor_info.`name` as doctor_name,
test_name,
medicine,
user_prescription_history.id as history_id,
user_prescription_history.date,
user_prescription_history.image
FROM
user_prescription_history
LEFT JOIN user_info ON user_prescription_history.user_id = user_info.id
LEFT JOIN doctor_info ON user_prescription_history.doctor_id = doctor_info.id
WHERE user_prescription_history.user_id = $user_id";

$result = mysqli_query($conn,$sql);
 $history_array = array();
                if($result){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
           array_push($history_array, $row);
           
          }} ?>
 <div class="box-body">
         

<div class="box">
            <div class="box-header">
              <h3 class="box-title">User History</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>History ID</th>
                  <th>User Name</th>
                  <th>Doctor Name</th>
                  <th>Date</th>
                  <th>Action</th>                   
                </tr>
                </thead>
                <tbody>
                  <?php foreach($history_array as $aa){?>
                <tr>
                  <td><?php echo $aa['history_id'];?></td>
                  <td><?php echo $aa['name'];?></td>
                  <td><?php echo $aa['doctor_name'];?></td>
                  <td><?php echo $aa['date'];?></td> 

                  <form action="view_prescription.php" method="post">
                    <input type="hidden" name="user_id" value= "<?php echo $user_id;?>">
                    <input type="hidden" name="history_id" value= "<?php echo $aa['history_id'];?>">
                  <td><button type="submit" class = "btn btn-warning">View Prescription</button></td>
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
