<?php 

include('admin_header.php');
include('../db_connect.php');

$sql = "SELECT *
FROM
diagnostic_info";

$result = mysqli_query($conn,$sql);
?>
 <div class="box-body">
          <div class="row">
           
        

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Review Doctor</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align: center">
                <thead>
                <tr style="background-color: #3c8dbc;color: #fff">
                  <th>Sl</th>
                  <th>Diagnostic Name</th>
                  <th>Contact No</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Action</th>
                  <th>Status</th>                   
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                  $sl = 0;
                if($result){
                if($result->num_rows > 0){
                  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    $sl++;
                    ?>
                <tr>
                  <td><?php echo $sl; ?></td>          
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['contact']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                 <td>

                 <a href="diagnostic_registration_accept.php?id=<?php echo $row['id'];?>&status=1" <i class = "fa fa-check-circle" title="Accept" style="font-size: 30px;"></i></a>

                 <a href="diagnostic_registration_accept.php?id=<?php echo $row['id'];?>&status=0" <i class = "fa fa-times-circle-o" title="Reject" style="font-size: 30px;"></i></a></td>
                  <?php if( $row['status'] == 1){?>
                  <td><label  class = "btn btn-info">Accepted</label></td>
                  <?php } ?>
                  <?php if( $row['status'] == 0){?>
                  <td><label  class = "btn btn-danger">Rejected</label></td>
                  <?php } ?>
                  
                  

                </tr>            
              
                <?php } }}?>
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