<?php include('user_header.php');
include('../db_connect.php');
//print_r($_POST); exit;
 $diagnostic_id = $_POST['diagnostic_id'];
 $test_id = $_POST['test_id'];
 $costSql = "SELECT test_name,cost FROM all_test WHERE id = $test_id";
 $cost = mysqli_fetch_object(mysqli_query($conn,$costSql))->cost;
 $test_name = mysqli_fetch_object(mysqli_query($conn,$costSql))->test_name;
 $sql = "SELECT name FROM `diagnostic_info`  WHERE id = $diagnostic_id";
$name = mysqli_fetch_object(mysqli_query($conn,$sql))->name;
// $returning_fee = mysqli_fetch_object(mysqli_query($conn,$sql))->returning_patient_fee;
$user_id = $_POST['user_id'];
$date = $_POST['date'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
?>
<div class = "col-md-12">

<div class="col-md-4" style = "margin-left:36%">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-medkit-outline"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-number">Diagnostic Center Name</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                    <?php echo $name?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div>
<div class="col-md-4" style = "margin-left:20%">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-medkit-outline"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-number">Test Name</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                   <p><?php echo $test_name?></p>
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
                    <?php echo $cost?>
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
                    <?php echo $date?>
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
          <br><button  onclick="pass_appointment_info('<?php echo $start_time;?>','<?php echo $end_time;?>','<?php echo $date;?>','<?php echo $_SESSION['user_id']?>','<?php echo $_POST['diagnostic_id']?>','<?php echo $_POST['test_id']?>')" class="btn btn-info center-block" >Submit</button>
          
          </div>
          
<?php include('user_footer.php')?>
<script>
 function pass_appointment_info(start_time,end_time,date,user_id,diagnostic_id,test_id)
  {
    var trxid  = $('#trxid').val();
     $('<form action="submit_diagnostic_appoint_info.php" method="post">' +
      '<input type="hidden" name="diagnostic_id" value="' + diagnostic_id + '">' +
      '<input type="hidden" name="test_id" value="' + test_id + '">' +
      '<input type="hidden" name="user_id" value="' + user_id + '">' +
      '<input type="hidden" name="date" value="' + date + '">' +
      '<input type="hidden" name="start_time" value="' + start_time + '">' +
      '<input type="hidden" name="end_time" value="' + end_time + '">' +
      '<input type="hidden" name="trxid" value="' + trxid + '">' +
   '</form>').appendTo('body').submit();
  }
  </script>