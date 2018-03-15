 <?php include('user_header.php')?>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
 $doctor_id = $_POST['doctor_id'];
 $date = $_POST['date'];

 $date = date_create($date);
$date = $date->format('Y-m-d');

 //echo $date; exit();
 //$interval = $_POST['interval'];
// $date = date("Y-m-d");

$each_doctor = "SELECT
doctor_info.id,
doctor_info.`name`,
doctor_schedule.non_visiting_day_string,
doctor_schedule.slot_1_start_time,
doctor_schedule.slot_1_end_time,
doctor_credentials.duration_per_patient,
doctor_schedule.reservation_date_from,
doctor_schedule.reservation_date_to
FROM
doctor_info
INNER JOIN doctor_schedule ON doctor_info.id = doctor_schedule.doctor_id
INNER JOIN doctor_credentials ON doctor_schedule.doctor_id = doctor_credentials.doctor_id
WHERE doctor_info.id = $doctor_id
";
 $result_each_doctor = mysqli_query($conn,$each_doctor);
                if($result_each_doctor->num_rows > 0){
                  $row_each_doctor = mysqli_fetch_array($result_each_doctor,MYSQLI_ASSOC);
                  $doctor_id = $row_each_doctor['id'];
                  $doctor_name = $row_each_doctor['name'];
                  $disable_day = $row_each_doctor['non_visiting_day_string'];
                  $start_time = $row_each_doctor['slot_1_start_time'];
                  $end_time = $row_each_doctor['slot_1_end_time'];
                  $interval = $row_each_doctor['duration_per_patient'];
                  $date_from = $row_each_doctor['reservation_date_from'];
                  $date_to = $row_each_doctor['reservation_date_to'];
                  //echo $row_each_doctor['non_visiting_day_string'];

                }
}

else{
 $doctor_id = '';
 $interval = '';
 $date = date("Y-m-d"); 
}
$all_doctor = "SELECT
doctor_info.id,
doctor_info.`name`
from doctor_info
";
 ?>

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
        <form action = "../user/doctor_appointment.php" method = "post">
          <h3 class="box-title">Application For Doctor Appoinment</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">               
                 <h5>Select Doctor</h5>
                <select id = "select_dr" name = "doctor_id" class="form-control select2" style="width: 100%;">
                  <option value="select">Select Doctor</option>
                  <?php

                $result_all_doctor = mysqli_query($conn,$all_doctor);
                if($result_all_doctor->num_rows > 0){

                   while($row_all_doctor = mysqli_fetch_array($result_all_doctor,MYSQLI_ASSOC)) {
                   //$doctor_id = $row_all_doctor['id']; ?>

                  <option <?php
                  if(isset($_POST['inside'])){if($_POST['doctor_id'] == $row_all_doctor['id']){echo "selected= 'selected'";}}
                   if(isset($_POST['outside'])){if($_POST['doctor_id'] == $row_all_doctor['id']){echo "selected= 'selected'";}echo "readonly";}?> value = "<?php  echo $row_all_doctor['id'];?>"><?php echo $row_all_doctor['name'];?></option>
                  <?php }}?>
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
        </div>
      </div>


        
       
<?php 
              



                $sql = "SELECT
user_schedule_table.start_time
FROM `user_schedule_table`
WHERE date = '$date' and doctor_id = $doctor_id
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

          ?>

<?php
if(isset($start_time)){
$start_date_time = $date." ".$start_time;
$end_date_time = $date." ".$end_time;
$begin = new DateTime($start_date_time);
$end   = new DateTime($end_date_time);

$duration = $interval." min";
$interval = DateInterval::createFromDateString($duration);

$times    = new DatePeriod($begin, $interval, $end);
//echo '<pre>'; print_r($times); exit;
?>
<?php

$user_id = $_SESSION['user_id'];
$check_row = "select * from user_schedule_table where doctor_id = $doctor_id and user_id = $user_id and `date` = '$date'";
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
          <div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

  <strong>Sorry!</strong> <?php echo $_SESSION['msg']?>
</div>
<?php 
}
}
else{

  ?>


        <div class="box box-default">
      

        <div class="col-md-12">
              <div class="form-group text-center">
                 <h3>Select Type</h3>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <input type="radio" class="type" name="type" value="0">Returning Visit 
                  <input type="radio" style="margin-left: 50px;" class="type" name="type" value="1">New Visit
                  </div>
                  
                </div>
              </div>
            </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">               
                  <div class="box-header with-border" style = "text-align: center;">
          <h3 class="box-title" >Select Your Preferable Time Slot</h3>
        </div>
                  <div class="text-center" style = "margin:2px;" >

                    <?php 
  foreach ($times as $time) { 

$start_time = $time->format('H:i'); 
$end_time = $time->add($interval)->format('H:i'); ?>

    <a target="_blank" onclick="pass_appointment_info('<?php echo $start_time;?>','<?php echo $end_time;?>','<?php echo $date;?>','<?php echo $_SESSION['user_id']?>','<?php echo $_POST['doctor_id']?>')"><button <?php if (in_array($start_time, $time_array)){ echo 'class="btn btn btn-danger"'.'disabled';}
    else{
    echo 'class="btn btn btn-primary "';
  } ?> style = "margin-bottom:20px;"><?php    echo $start_time, ' - ', 
         $end_time, "\n"
         ;
        
         ?></button> </a>


<?php
 }?>

  

<?php }

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

            <input type ='hidden' id ='date_from_year' name = 'date_from_year'>
       

</div>




<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- Select2 -->
<script src="../asset/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../asset/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../asset/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../asset/bower_components/moment/min/moment.min.js"></script>

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
    //return date_from_year;

      data = disable1.split(',');
      for (a in data ) {
            data[a] = parseInt(data[a], 10); // Explicitly include base as per Álvaro's comment
        }
      console.log(data);

    //disable1 = [disable1];
      //var a = '['+disable+']';
    if ($.inArray(day,data) >= 0) {
            return [false] ; 
        }

     else { 
     
     return [true] ;
     }
    
  }

</script>
<script type="text/javascript">


  $(document).ready(function() {
  var doctor_id = $('#select_dr').val().trim();
    if(doctor_id != 'select'){
      
    
      if(form_validation())
      {
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'get_doctor_info.php',
          data:{ 
              doctor_id: doctor_id
            },
          //timeout: 4000,
          success: function(result) {
             //alert(result);


            return_json = JSON.parse(result);
            disable1 = return_json['disable_day'];
            var date_from = return_json['date_from'];
            var date_to = return_json['date_to'];

            date_from_string = new Date(date_from);
            date_from_day = date_from_string.getDate();
            date_from_month =  date_from_string.getMonth();
            date_from_month += 1;  // JavaScript months are 0-11
            date_from_year = date_from_string.getFullYear();

            date_to_string = new Date(date_to);
            date_to_day = date_to_string.getDate();
            date_to_month =  date_to_string.getMonth();
            date_to_month += 1;  // JavaScript months are 0-11
            date_to_year = date_to_string.getFullYear();

            $( "#datepicker" ).datepicker({
              beforeShowDay: DisableDay,
              minDate: new Date(date_from_year, date_from_month - 1, date_from_day),              
              maxDate: new Date(date_to_year, date_to_month - 1, date_to_day)
            });

          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
          }
        });
        
      
       }
     }
   $('select').on('change', function() {
      var doctor_id = $('#select_dr').val().trim();

      if(form_validation())
      {

        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'get_doctor_info.php',
          data:{ 
              doctor_id: doctor_id
            },
          //timeout: 4000,
          success: function(result) {
            //alert(result);

            return_json = JSON.parse(result);
            disable1 = return_json['disable_day'];
            if(disable1 == null){alert("This doctor didn't set any info !! Please choose another doctor.."); return false;}
            var date_from = return_json['date_from'];
            var date_to = return_json['date_to'];

            date_from_string = new Date(date_from);

            date_to_string = new Date(date_to);
            date_from_day = date_from_string.getDate();
            date_from_month =  date_from_string.getMonth();
            date_from_month += 1;  // JavaScript months are 0-11
            date_from_year = date_from_string.getFullYear();

            date_to_day = date_to_string.getDate();
            date_to_month =  date_to_string.getMonth();
            date_to_month += 1;  // JavaScript months are 0-11
            date_to_year = date_to_string.getFullYear();
            $( "#datepicker" ).datepicker({
              beforeShowDay: DisableDay,

              minDate: new Date(date_from_year, date_from_month - 1, date_from_day),
              // minDate: new Date(2018, 1 - 1, 15),

              //maxDate: new Date(2018, 4 - 1, 21)
              maxDate: new Date(date_to_year, date_to_month - 1, date_to_day)
            });

            //disable1 = response;
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
    
    if($('#select_dr').val().trim() == "select")
    {
      alert("Please Select Doctor");
      $('#select_dr').focus();
      return false;
    } 

    return true;
  }
  function pass_appointment_info(start_time,end_time,date,user_id,doctor_id)
  {
     if(confirm('date = '+date+' time = '+start_time+'-'+end_time+'Are you sure to get appointment in this time slot?')){
      var type = $('.type:checked').val(); 
      $('<form action="confirmation.php" method="post">' +
      '<input type="hidden" name="doctor_id" value="' + doctor_id + '">' +
      '<input type="hidden" name="user_id" value="' + user_id + '">' +
      '<input type="hidden" name="date" value="' + date + '">' +
      '<input type="hidden" name="start_time" value="' + start_time + '">' +
      '<input type="hidden" name="end_time" value="' + end_time + '">' +
      '<input type="hidden" name="type" value="' + type + '">' +
   '</form>').appendTo('body').submit();

        
      }
  }  



</script>
