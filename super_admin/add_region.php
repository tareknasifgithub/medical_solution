 <?php include('admin_header.php')?>

 
       
      <div class="row">       
        
        
        <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">
          <div class="col-md-12">
               <div class="form-group">
                  <label>Name:</label>
                  <input type="text" id= "region_name" class="form-control" placeholder="Add Region Name">
                </div>
              </div>
            </div>
          </div>
        </div>


        </div>

<div class="form-actions">
    <div class="row">
    <div class="col-md-offset-5 col-md-8">

<button type = "button" id = "add_region" class="btn btn-primary">Submit </button>

      </div>
     </div>

     </div>


     <div style = "margin-top:10px" class="box">
            <div class="box-header">
              <h3 class="box-title">Region Name</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Region Name</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                include('../db_connect.php');
                $sql = "select * from tbl_region";
                $result = mysqli_query($conn,$sql);
                if($result){
                if($result->num_rows > 0){
                  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
                        <tr>
                          <td><?php echo $row['region_name']; ?></td>
                        </tr>
                <?php 
                }
                   }}
                ?>


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
  })
</script>


 <?php include('admin_footer.php')?>



<script type="text/javascript">


  $(document).ready(function() {
    $("#add_region").click(function(){
      if(form_validation())
      {
        //alert("validation true");
        
        var region_name = $('#region_name').val().trim();
        
      
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'add_region_submit.php',
          data:{ 
              region_name: region_name,
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
    //alert("validation");
    
    if($('#region_name').val().trim() == "")
    {
      alert("Please Insert Region Name");
      $('#region_name').focus();
      return false;
    }  
    return true;
  }


</script>

