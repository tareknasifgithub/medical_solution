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

if(isset($_POST['outside'])){
 $doctor_id = $_POST['doctor'];
 $interval = $_POST['interval'];
 $date = date("Y-m-d"); 
}

if(isset($_POST['inside'])){
 $doctor_id = $_POST['doctor'];
 $interval = $_POST['interval'];
 $date = date("Y-m-d"); 
}

if(!isset($_POST['inside']) && !isset($_POST['outside']) ){

  echo "Thanks";}

?>

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select Date</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
<?php 
$all_doctor = "SELECT
doctor_info.id,
doctor_info.`name`
from doctor_info
";

$all_doctor = "SELECT
doctor_info.id,
doctor_info.`name`,
doctor_schedule.non_visiting_day_string,
doctor_schedule.slot_1_start_time,
doctor_credentials.duration_per_patient,
doctor_schedule.reservation_date_from,
doctor_schedule.reservation_date_to
FROM
doctor_info
INNER JOIN doctor_schedule ON doctor_info.id = doctor_schedule.doctor_id
INNER JOIN doctor_credentials ON doctor_schedule.doctor_id = doctor_credentials.doctor_id
";
 ?>
        



             <div class="col-md-6">
              <div class="form-group">               
                
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Select Doctor</option>
                  <?php

                $result_all_doctor = mysqli_query($conn,$all_doctor);
                if($result_all_doctor->num_rows > 0){

                   while($row_all_doctor = mysqli_fetch_array($result_all_doctor,MYSQLI_ASSOC)) { ?>

                  <option value = "<?php echo $row_all_doctor['id'];?>"><?php echo $row_all_doctor['name'];?></option>
                  <?php }}?>
                </select>
              </div>              
            </div>

                        <div class="col-md-6">
              <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>

              </div>


            </div>

            <button type = "button" id = "seacrh_avilable_time_button" class="btn btn-primary center-block">Submit </button>
            
            </div>

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
       
<?php 
              $doctor_id = 1;
              $time_interval = 30;
              $disable_day = '2,4,6';

              
                $sql_doctor_schedule = "SELECT *
FROM
doctor_schedule where doctor_id = $doctor_id";
//echo $sql;exit();
                $result_doctor_schedule = mysqli_query($conn,$sql_doctor_schedule);
                if($result_doctor_schedule->num_rows > 0){
                  $row_doctor_schedule = mysqli_fetch_array($result_doctor_schedule,MYSQLI_ASSOC);
                }


                $sql = "SELECT
user_schedule_table.start_time
FROM `user_schedule_table`
WHERE date = '2018-01-11' and doctor_id = 1
";

$result = mysqli_query($conn,$sql);
 $time_array = array();
                if($result->num_rows > 0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { 

           $d=strtotime($row['start_time']);
   $time =  date("h:i", $d);
           array_push($time_array, $time);
           
          }} //echo '<pre>'; print_r($time_array);

          ?>

        <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select Doctor</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">               
                
                  <div class="text-center" style = "margin:2px;" >
<?php
                  $begin = new DateTime("2018-10-10 10:00 AM");
$end   = new DateTime("2018-10-10 01:00 PM");


$interval = DateInterval::createFromDateString('15 min');

$times    = new DatePeriod($begin, $interval, $end);
?>
<?php
foreach ($times as $time) { 

$start_time = $time->format('H:i'); 
$end_time = $time->add($interval)->format('H:i'); ?>

    <button <?php if (in_array($start_time, $time_array)){ echo 'class="btn btn btn-danger" disabled';}
    else{
    echo 'class="btn btn btn-primary "';
  } ?> style = "margin-bottom:20px;"><?php    echo $time->format('H:i'), ' - ', 
         $time->add($interval)->format('H:i'), "\n"
         ;
        
         ?></button>

         

<?php
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

        <button type = "submit" class="btn btn-primary center-block">Submit </button>
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
                    function DisableDay(date) {
 
                        var day = date.getDay();
                       // If day == 1 then it is MOnday
                      //disable = [0,1];
                      if ($.inArray(day, [1]) >= 0) {
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
    $("#seacrh_avilable_time_button").click(function(){
              alert("Hi");
             // return false;
        
      var datepicker = $('#datepicker').val().trim();
      var doctor_id = '<?php echo $doctor_id;?>';
      var time_interval = '<?php echo $time_interval;?>';
      var disable_day = '<?php echo $disable_day;?>';
       alert(disable_day);

      if(form_validation())
      {
        //alert(select_day);
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: '../user/create_time_interval.php',
          data:{ 
              datepicker: datepicker,
              doctor_id: doctor_id,
              time_interval: time_interval,
              disable_day: disable_day
            },
          //timeout: 4000,
          success: function(result) {
            response = result;
            alert(response);
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
    
    if($('#datepicker').val().trim() == "")
    {
      alert("Please Insert Date");
      $('#datepicker').focus();
      return false;
    } 

    return true;
  }


</script>
