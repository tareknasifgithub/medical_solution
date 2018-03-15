<?php include('user_header.php');
include('../db_connect.php');
//print_r($_POST); exit;
$doctor_id = $_POST['doctor_id'];
$doctor_name = mysqli_fetch_object(mysqli_query($conn,"SELECT name FROM doctor_info WHERE id = $doctor_id"))->name;
$sql = "SELECT new_patient_fee, returning_patient_fee FROM doctor_credentials WHERE doctor_id = $doctor_id";
$new_fee = mysqli_fetch_object(mysqli_query($conn,$sql))->new_patient_fee;
$returning_fee = mysqli_fetch_object(mysqli_query($conn,$sql))->returning_patient_fee;
$user_id = $_POST['user_id'];
$date = $_POST['date'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$type = $_POST['type'];
?>
<div class = "col-md-12">

<div class="col-md-4" style = "margin-left:20%">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-medkit-outline"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-number">Doctor Name</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    <?php echo $doctor_name;?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>
<div class="col-md-4">
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-android-add-circle"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-number">Fee</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                   &#2547; <?php if($type==0){
                       echo $returning_fee;}
                      else{echo $new_fee;} 
                    ?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
      </div>
</div>
<div class = "col-md-12">


      <div class="col-md-4" style = "margin-left:20%">
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-android-calendar"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-number">Date</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    <?php echo $date;?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>
          <div class="col-md-4">
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion ion-android-alarm-clock"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-number">Time</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    <?php echo $start_time."-".$end_time?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          
            <!-- /.box-footer -->
          </div>
          </div>
        <div class = "col-md-12">


      <div class="col-md-4" style = "margin-left:20%">
      </div>
       <div class="col-md-8" >
      </div>
          <label class="alert alert-info" style = "margin-left:21%">
   			If you really want to take appointment please send your fee to 017XXXXXXXX and send your transaction id
		</label>
          </div>

          
          <div class="col-md-4" style="align:center;margin-left:38%">
          <input type="text" class="form-control" id="trxid" name="trxid" placeholder="Give Your Transaction Id">
          <br><button  onclick="pass_appointment_info('<?php echo $start_time;?>','<?php echo $end_time;?>','<?php echo $date;?>','<?php echo $_SESSION['user_id']?>','<?php echo $_POST['doctor_id']?>')" class="btn btn-info center-block" >Submit</button>
          
          </div>
          
<?php include('user_footer.php')?>
<script>
 function pass_appointment_info(start_time,end_time,date,user_id,doctor_id)
  {
    var trxid  = $('#trxid').val();
     $('<form action="submit_dr_appoint_info.php" method="post">' +
      '<input type="hidden" name="doctor_id" value="' + doctor_id + '">' +
      '<input type="hidden" name="user_id" value="' + user_id + '">' +
      '<input type="hidden" name="date" value="' + date + '">' +
      '<input type="hidden" name="start_time" value="' + start_time + '">' +
      '<input type="hidden" name="end_time" value="' + end_time + '">' +
      '<input type="hidden" name="trxid" value="' + trxid + '">' +
   '</form>').appendTo('body').submit();
  }
  </script>