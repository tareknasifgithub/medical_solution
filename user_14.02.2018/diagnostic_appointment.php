 <?php include('user_header.php')?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../asset/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../asset/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../asset/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css">
    <section class="content">
    <?php

if(isset($_POST['inside'])){

 $diagnostic_id = $_POST['diagnostic_id'];
 $date = $_POST['date'];
 $test_id = $_POST['test_id'];



 $date = date_create($date);
$date = $date->format('Y-m-d');

 $each_test_info = "select * from all_test where id = $test_id and diagnostic_id = $diagnostic_id";

  $result_each_test = mysqli_query($conn,$each_test_info);
if($result_each_test->num_rows > 0){
  $row_each_test = mysqli_fetch_array($result_each_test,MYSQLI_ASSOC);


  $interval = $row_each_test['duration_per_test'];
}

$each_diagnostic = "SELECT
        diagnostic_info.id,
        diagnostic_info.`name`,
        diagnostic_schedule.non_visiting_day_string,
        diagnostic_schedule.slot_1_start_time,
        diagnostic_schedule.slot_1_end_time,
        diagnostic_schedule.reservation_date_from,
        diagnostic_schedule.reservation_date_to
FROM
        diagnostic_info
LEFT JOIN diagnostic_schedule ON diagnostic_info.id = diagnostic_schedule.diagnostic_id
LEFT JOIN diagnostic_credentials ON diagnostic_schedule.diagnostic_id = diagnostic_credentials.diagnostic_id
WHERE
        diagnostic_info.id = $diagnostic_id
";

 $result_each_diagnostic = mysqli_query($conn,$each_diagnostic);
if($result_each_diagnostic->num_rows > 0){
  $row_each_diagnostic = mysqli_fetch_array($result_each_diagnostic,MYSQLI_ASSOC);

  $diagnostic_id = $row_each_diagnostic['id'];
  $diagnostic_name = $row_each_diagnostic['name'];
  $disable_day = $row_each_diagnostic['non_visiting_day_string'];
  $start_time = $row_each_diagnostic['slot_1_start_time'];
  $end_time = $row_each_diagnostic['slot_1_end_time'];
  $date_from = $row_each_diagnostic['reservation_date_from'];
  $date_to = $row_each_diagnostic['reservation_date_to'];
  //echo $row_each_diagnostic['non_visiting_day_string'];
}
}

else{
 $diagnostic_id = '';
 $interval = '';
 $date = date("Y-m-d");
}
$all_diagnostic_center = "SELECT
diagnostic_info.id,
diagnostic_info.`name`
from diagnostic_info
";

 ?>

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
        <form action = "../user/diagnostic_appointment.php" method = "post">
          <h3 class="box-title">Application For Diagnostic Test Appointment</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">


             <div class="col-md-6">
              <div class="form-group">               
                <h5>Select Diagnostic Center</h5>
                <select id = "select_diagnostic" name = "diagnostic_id" class="form-control select2" style="width: 100%;">
                  <option value="select">Select Diagnostic Center</option>
                  <?php

                $result_all_diagnostic_center = mysqli_query($conn,$all_diagnostic_center);
                if($result_all_diagnostic_center->num_rows > 0){

                   while($row_all_diagnostic_center = mysqli_fetch_array($result_all_diagnostic_center,MYSQLI_ASSOC)) {
                   //$doctor_id = $row_all_doctor['id']; ?>

                  <option <?php
                  if(isset($_POST['inside'])){if($_POST['diagnostic_id'] == $row_all_diagnostic_center['id']){echo "selected= 'selected'";}}
                   if(isset($_POST['outside'])){if($_POST['diagnostic_id'] == $row_all_diagnostic_center['id']){echo "selected= 'selected'";}echo "readonly";}?> value = "<?php  echo $row_all_diagnostic_center['id'];?>"><?php echo $row_all_diagnostic_center['name'];?></option>
                  <?php }}?>
                </select>
              </div>              
            </div>             

            <div class="col-md-6">
              <div class="form-group">
                <h5>Select Test</h5>
                <select id = "test_id" name = "test_id" class="form-control select2" style="width: 100%;">

                </select>
              </div>              
            </div>

                        <div class="col-md-6">
              <div class="form-group">
                <h5>Select Date</h5>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" value = "<?php if(isset($_POST['inside'])){echo $_POST['date'];}?>" name = "date"class="form-control pull-right" id="datepicker">
                </div>

              </div>


            </div>

 <input type ="hidden" name= "inside" value = "0">
            <button type = "submit" id = "seacrh_avilable_time_button" class="btn btn-primary center-block">Submit </button>

            </form>
            
            </div>

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
       
<?php 

$sql = "SELECT
user_diag_schedule_table.start_time
FROM `user_diag_schedule_table`
WHERE date = '$date' and diagnostic_id = $diagnostic_id
";
//echo $sql;
$result = mysqli_query($conn,$sql);
 $time_array = array();
                 if($result){
                if($result->num_rows > 0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { 

           $d=strtotime($row['start_time']);
   $time =  date("h:i", $d);
           array_push($time_array, $time);
           
          }}} //echo '<pre>'; print_r($time_array);

          if(isset($start_time)){
$start_date_time = $date." ".$start_time;
$end_date_time = $date." ".$end_time;
$begin = new DateTime($start_date_time);
$end   = new DateTime($end_date_time);

$duration = $interval." min";
$interval = DateInterval::createFromDateString($duration);

$times    = new DatePeriod($begin, $interval, $end);

$user_id = $_SESSION['user_id'];
$check_row = "select * from user_diag_schedule_table where diagnostic_id = $diagnostic_id and user_id = $user_id and `date` = '$date' and test_id = $test_id" ;
  //echo $check_row;exit();
  $result = mysqli_query($conn,$check_row);
        //echo "<pre>"; print_r($result->num_rows);exit();
        if($result->num_rows > 0)
          {
           $_SESSION['msg'] = "You have already taken an Appointment in this day! Try Another Date.";

      }
         else{
            unset($_SESSION["msg"]);
          }

if(isset($_SESSION['msg'])){ ?>

<?php if(isset($_POST['inside'])){?>

 <div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

  <strong>Sorry!</strong> <?php echo $_SESSION['msg']?>
</div>
<?php 
}
}
else{

  ?>


        <div class="box box-default">
        <div class="box-header with-border" style = "text-align: center;">
          <h3 class="box-title" >Select Your Preferable Time Slot</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">               
                
                  <div class="text-center" style = "margin:2px;" >

                    <?php 


?>
<?php
foreach ($times as $time) { 

$start_time = $time->format('H:i'); 
$end_time = $time->add($interval)->format('H:i'); ?>

    <a target="_blank" onclick="pass_appointment_info('<?php echo $start_time;?>','<?php echo $end_time;?>','<?php echo $date;?>','<?php echo $_SESSION['user_id']?>','<?php echo $diagnostic_id?>','<?php echo $test_id?>')"><button <?php if (in_array($start_time, $time_array)){ echo 'class="btn btn btn-danger"'.'disabled';}
    else{
    echo 'class="btn btn btn-primary "';
  } ?> style = "margin-bottom:20px;"><?php    echo $start_time, ' - ', 
         $end_time, "\n"
         ;
        
         ?></button> </a>
<?php
 }
}

}

?>
            
                
              </div>
              
              </div>              
            </div>
            
            </div>

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
            </form>
       

</div>

<?php include('user_footer.php')?>
<!-- ./wrapper -->

<!-- jQuery 3 -->
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
<!-- FastClick -->
<script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../asset/dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>

<link rel="stylesheet" href="../css/jquery-ui.css" />
                  <script src="../js/jquery-ui.js"></script>
                  <script>
                  //var disable= 1;

                    function DisableDay(date) {

                        var data = new Array();
                        var day = date.getDay();
                       // If day == 1 then it is MOnday
                      //disable1 = [0,1,3];
                     // alert(disable1);

                        data = disable1.split(',');
                        for (a in data ) {
                              data[a] = parseInt(data[a], 10); // Explicitly include base as per Álvaro's comment
                          }
                        //console.log(data);

                      //disable1 = [disable1];
                        //var a = '['+disable+']';
                      if ($.inArray(day,data) >= 0) {
                              return [false] ; 
                          }

                       else { 
                       
                       return [true] ;
                       }
                        
                      }
                    $(function() {
                    $( "#datepicker" ).datepicker({

                       beforeShowDay: DisableDay,
                       minDate: 0, maxDate: "+1M +10D"
                       });
                    });
                  </script>
<script type="text/javascript">


  $(document).ready(function() {
  var diagnostic_id = $('#select_diagnostic').val().trim();
    if(diagnostic_id != 'select'){
      
    
      if(form_validation())
      {
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'get_diagnostic_info.php',
          data:{ 
              diagnostic_id: diagnostic_id
            },
          //timeout: 4000,
          success: function(result) {
            return_json = JSON.parse(result);
            disable1 = return_json['disable_day'];
            var all_test = return_json['all_test_info'];
            $('#test_id').html(all_test);
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
          }
        });
        
       }
     }
   $('#select_diagnostic').change(function() {
      var diagnostic_id = $('#select_diagnostic').val().trim();

      if(form_validation())
      {
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'get_diagnostic_info.php',
          data:{ 
              diagnostic_id: diagnostic_id
            },
          //timeout: 4000,
          success: function(result) {
            //response = result;
            return_json = JSON.parse(result);
            disable1 = return_json['disable_day'];
            var all_test = return_json['all_test_info'];
            $('#test_id').html(all_test);
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
          }
        });
        
      
      }
    

  });
  

      });  
  
  function form_validation()
  {
    
    if($('#select_diagnostic').val().trim() == "select")
    {
      alert("Please Select Diagnostic Center");
      $('#select_dr').focus();
      return false;
    } 

    return true;
  }
  function pass_appointment_info(start_time,end_time,date,user_id,diagnostic_id,test_id)
  {
     if(confirm('date = '+date+' time = '+start_time+'-'+end_time+'Are you sure to get appointment in this time slot?')){


    $('<form action="confirmation_diag.php" method="post">' +
      '<input type="hidden" name="diagnostic_id" value="' + diagnostic_id + '">' +
      '<input type="hidden" name="test_id" value="' + test_id + '">' +
      '<input type="hidden" name="user_id" value="' + user_id + '">' +
      '<input type="hidden" name="date" value="' + date + '">' +
      '<input type="hidden" name="start_time" value="' + start_time + '">' +
      '<input type="hidden" name="end_time" value="' + end_time + '">' +
   '</form>').appendTo('body').submit();
      }
  }


</script>
