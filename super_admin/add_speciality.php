 <?php include('admin_header.php')?>

 
       
      <div class="row">       
        
        
        <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">
          <div class="col-md-12">
               <div class="form-group">
                  <label>Name:</label>
                  <input type="text" id= "specialist_area" class="form-control" placeholder="Add Speciality Name">
                </div>
              </div>
            </div>
          </div>
        </div>     

           <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">
          <div class="col-md-12">
               <div class="form-group">
                  <label>Icon Name:</label>
                  <input type="text" id= "icon_name" class="form-control" placeholder="Add Icon Name">
                </div>
              </div>
            </div>
          </div>
        </div>


        </div>

<div class="form-actions">
    <div class="row">
    <div class="col-md-offset-5 col-md-8">

<button type = "submit" id = "add_speciality" class="btn btn-primary">Submit </button>

      </div>
     </div>

     </div>


     <div style = "margin-top:10px" class="box">
            <div class="box-header">
              <h3 class="box-title">Prescription History</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Specialist Area Name</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                include('../db_connect.php');
                $sql = "select * from doctor_specialist_area";
                $result = mysqli_query($conn,$sql);
                if($result->num_rows > 0){
                  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
                        <tr>
                          <td><?php echo $row['specialist_area']; ?></td>
                        </tr>
                <?php 
                }
                   }
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
    $("#add_speciality").click(function(){
      if(form_validation())
      {
        //alert("validation true");
        
        var specialist_area = $('#specialist_area').val().trim();
        var icon_name = $('#icon_name').val().trim();
        
      
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'add_speciality_submit.php',
          data:{ 
              specialist_area: specialist_area,
              icon_name: icon_name
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
    
    if($('#specialist_area').val().trim() == "")
    {
      alert("Please Insert New Specialist Area");
      $('#specialist_area').focus();
      return false;
    }     

    if($('#icon_name').val().trim() == "")
    {
      alert("Please Insert Icon Name");
      $('#icon_name').focus();
      return false;
    } 

    return true;
  }


</script>

