<?php include('admin_header.php')?>


      <div class="row">       
        
        
        <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">
          <div class="col-md-12">
               <div class="form-group">
                  <label>Drag Reg NO:</label>
                  <input type="text" id= "drag_reg_no" class="form-control" placeholder="Add Drag Reg No">
                </div>
              </div>
            </div>
          </div>
        </div>


        </div>

<div class="form-actions">
    <div class="row">
    <div class="col-md-offset-5 col-md-8">

<button type = "button" id = "add_drag_reg_no" class="btn btn-primary">Submit </button>

      </div>
     </div>

     </div>


<?php
include('../db_connect.php');

//$doctor_id =  $_SESSION['doctor_id'];
 $sql = "select * from tbl_drag_reg_no";
$result = mysqli_query($conn,$sql);
?>
 <div class="box-body">
          <div class="row">
            
        

<div class="box">
            <div class="box-header">
              <h3 class="box-title">MMDC REG NO </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" style="text-align: center">
                <thead>
                <tr style="background-color: #3c8dbc;color: #fff">
                  <th style= "text-align:center">SL</th>                 
                  <th style= "text-align:center">Drag Reg No</th>                 
                  
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
                  <td><?php echo $row['drag_reg_no']; ?></td>           
              
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



<script type="text/javascript">


  $(document).ready(function() {
    $("#add_drag_reg_no").click(function(){
      if(form_validation())
      {
        var drag_reg_no = $('#drag_reg_no').val().trim();
        
      
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'add_drag_reg_no_submit.php',
          data:{ 
              drag_reg_no: drag_reg_no,
            },
          //timeout: 4000,
          success: function(result) {
            response = result;
            alert(response);
           location.reload();
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
          }
        });
        
        //alert(response);
        
      
      }
    

  });
  

      });  
  
  function form_validation()
  {
    if($('#drag_reg_no').val().trim() == "")
    {
      alert("Please Insert Drag Reg No");
      $('#drag_reg_no').focus();
      return false;
    }  
    return true;
  }


</script>