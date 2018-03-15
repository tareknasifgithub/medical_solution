 <?php include('user_header.php');
 include('../db_connect.php');
 $sql = "SELECT id, name FROM diagnostic_info";
 $user_id = $_POST['user_id'];
 $history_id = $_POST['history_id'];
$prescription_history_sql = "SELECT
user_info.`name`,
doctor_info.`id` as doctor_id,
doctor_info.`name` as doctor_name,
test_name,
medicine,
user_prescription_history.test_name,
user_prescription_history.medicine,
user_prescription_history.date,
user_prescription_history.image
FROM
user_prescription_history
LEFT JOIN user_info ON user_prescription_history.user_id = user_info.id
LEFT JOIN doctor_info ON user_prescription_history.doctor_id = doctor_info.id
WHERE user_prescription_history.user_id = $user_id and user_prescription_history.id = $history_id ";
//echo $prescription_history; exit();
$result = mysqli_query($conn,$prescription_history_sql);
$history_array = array();

  if($result){
    $prescription_history = mysqli_fetch_array($result,MYSQLI_ASSOC);
  }


 //echo $prescription_history_sql; exit;

$date = $prescription_history['date'];
$doctor_id = $prescription_history['doctor_id'];
$test = $prescription_history['test_name'];
$test_array = explode(",",$test);
//echo $test;
//echo "<pre>";print_r($test_array); exit();
$medicine = $prescription_history['medicine'];

$doctor_name = $prescription_history['doctor_name'];
$user_sql = "SELECT id, name, age, gender FROM user_info WHERE id = $user_id";
$user_name = mysqli_fetch_object(mysqli_query($conn,$user_sql))->name;
$user_age = mysqli_fetch_object(mysqli_query($conn,$user_sql))->age;
$user_gender = mysqli_fetch_object(mysqli_query($conn,$user_sql))->gender;


$result = mysqli_query($conn,$sql);
 $diagnostic_array = array();
                if($result){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

           array_push($diagnostic_array, $row);
           
          }} 

        
        //  echo "<pre>"; print_r($diagnostic_array);exit();?>
          
 <link rel="stylesheet" href="../asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <link rel="stylesheet" href="../asset/multiselect/multiselect.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../asset/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../asset/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../asset/bower_components/select2/dist/css/select2.min.css">
<style>
* {
  .border-radius(0) !important;
}

#field {
    margin-bottom:20px;
}
</style>
  <link rel="stylesheet" href="../asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
 <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Create Prescription</h3>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Doctor Name</label>
               <input type = "text" readonly id= "doctor_name" name = "doctor_name" class="form-control" value = "<?php echo $doctor_name?>">
              </div>
            </div>            
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Patient Name</label>
               <input type = "text" readonly id = "patient_name" class="form-control" value = "<?php echo $user_name?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Age</label>
              <input type = "text" readonly id = "age" class="form-control" value = "<?php echo $user_age?>">
              </div>
            </div>
      <div class="col-md-3">
              <div class="form-group">
                <label>Gender</label>
              <input type = "text" readonly id = "gender" class="form-control" value = "<?php echo $user_gender?>">
              </div>
            </div>
             <div class="col-md-3">
              <div class="form-group">
                <label>Date</label>
              <input id = "date" value = "<?php echo $date?>" type = "text" class="form-control" readonly>
              </div>
            </div>  
      
          </div>
        </div>
       
      </div>
      <!-- /.box -->

      <div class="row">
        <div class="col-md-4">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Test</h3>
            </div>
           <div class="box-body">             
              <div class="form-group">
                <label>Test:</label><br>

                  <?php for($i = 0;  $i < sizeof($test_array); $i++){ echo $i+1 .". ".$test_array[$i];?><br>
                  <?php }?>
                
              </div>


            </div>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Select Diagnostic</h3>
            </div>
           <div class="box-body">             
              <div class="form-group">
                <label>Select Diagnostic:</label>

               <select class="form-control" id = "select_diagnostic"   data-placeholder="Select Diagnostic">
                

//echo "<pre>";print_r($diagnostic_array);exit;

                  
                  <option value = "select">Select Diagnostic</option>
                    <?php 
                  foreach($diagnostic_array as $t_array){?>       
                  <option value = "<?php echo $t_array['id']?>"><?php echo $t_array['name']?></option>
                  <?php }?>
                </select>
                
              </div>
            </div>
          </div>

 <button style="align:center" id = 'btn_prescription' type = "button" class="btn btn-primary">Submit </button>
        </div>
        <!-- /.col (left) -->
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Medicine Name</h3>
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <div class="box-body pad">
                        <div>
                              <?php echo $prescription_history['medicine'];?>
                        </div>                
                </div>
              </div>
            </div>
          </div>
          </div>
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title" id = "test_title"></h3>
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <div class="box-body pad">
                        <div id = "test_id">
                        </div>                
                </div>
              </div>
            </div>
          </div>
          </div>


          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->
  
    </section>

<!-- FastClick -->
<script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../asset/dist/js/demo.js"></script>
    <!-- CK Editor -->
<script src="../asset/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


  <script src="../asset/dist/js/adminlte.min.js"></script>
  <script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../asset/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../asset/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../asset/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../asset/bower_components/moment/min/moment.min.js"></script>
<script src="../asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../asset/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../asset/plugins/iCheck/icheck.min.js"></script>



<script type="text/javascript">


  $(document).ready(function() {
  $("#btn_prescription").click(function(e){
var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
        });
        
        var test_id =val.toString();
        var diagnostic_id = $('#select_diagnostic').val().trim();
        pass_doctor_id(diagnostic_id,test_id);
  });

     $('#select_diagnostic').change(function() {
      var diagnostic_id = $('#select_diagnostic').val().trim();

        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'get_diagnostic_test_info.php',
          data:{ 
              diagnostic_id: diagnostic_id
            },
          //timeout: 4000,
          success: function(result) {
            //response = result;
           // alert(result);
            return_json = JSON.parse(result);
            var all_test = return_json['all_test_info'];
            var diagnostic_name = return_json['diagnostic_name'];
            console.log(all_test);
            $('#test_id').html(all_test);
            $('#test_title').html("Select "+diagnostic_name+" Test");
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
          }
        });
        

  });
  });

function pass_doctor_id(diagnostic_id,test_id) {
  // alert(doctor_id);
 $('<form action="confirmation_diagnostic.php" method="post">' +
  '<input type="hidden" name="test_id" value="' + test_id + '">' +
  '<input type="hidden" name="diagnostic_id" value="' + diagnostic_id + '">' +
   '</form>').appendTo('body').submit();
}

    

    
</script>


