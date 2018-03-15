<?php include('user_header.php')?>
<?php
include('../db_connect.php');
$condition = "";
if($_POST){
  $post_date = $_POST['date']; 
  $date = date_create($post_date);
$date = $date->format('Y-m-d');
$condition = "AND user_diagnostic_history.date = '$date'";
}
//$diagnostic_id =  $_POST['diagnostic_id'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT
user_info.`name` as user_name,
doctor_info.`name` as doctor_name,
user_diagnostic_history.date,
user_diagnostic_history.image
FROM
user_diagnostic_history
LEFT JOIN user_info ON user_diagnostic_history.user_id = user_info.id
LEFT JOIN doctor_info ON user_diagnostic_history.doctor_id = doctor_info.id
WHERE user_diagnostic_history.user_id = $user_id
$condition";

$result = mysqli_query($conn,$sql);
 $history_array = array();
                if($result){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
           array_push($history_array, $row);
           
          }} ?>

          <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <form action="diagnostic_history.php" method="post"> 
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date" class="form-control pull-right" id="datepicker">
                </div>

              </div>


            </div>
                               
                 <button type="submit" class = "btn btn-success">Search By Date</button>               
            </form>
          </div>
        </div>
 <div class="box-body">
         

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Diagnostic History</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th> User Name </th>
                  <th> Doctor Name </th>
                  <th> Date </th>
                  <th> Prescription </th>                  
                </tr>
                </thead>
                <tbody>
                  <?php foreach($history_array as $aa){?>
                <tr>
                  <td><?php echo $aa['user_name'];?></td>
                  <td><?php echo $aa['doctor_name'];?></td>
                  <td><?php echo $aa['date'];?></td>                          
                  <td>
                    <a href="download.php?file=<?php echo $aa['image']?>">
                    <button class = "btn btn-success">View</button></a></td>
                  
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
