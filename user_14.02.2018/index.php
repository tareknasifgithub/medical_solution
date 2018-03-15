
<?php include('user_header.php');
$user_id = $_SESSION['user_id'];
$count_doc = mysqli_fetch_object(mysqli_query($conn,"SELECT count(id) as id FROM doctor_info"))->id;
$count_diagnostic = mysqli_fetch_object(mysqli_query($conn,"SELECT count(id) as id FROM diagnostic_info"))->id;
$count_pending_doc_app = mysqli_fetch_object(mysqli_query($conn,"SELECT count(id) as id FROM user_schedule_table
  WHERE user_id = $user_id AND status = 0"))->id;
$count_pending_diag_app = mysqli_fetch_object(mysqli_query($conn,"SELECT count(id) as id FROM user_diag_schedule_table
  WHERE user_id = $user_id AND status = 0 "))->id;

?>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $count_doc?></h3>

              <p>Total Doctors</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $count_diagnostic?></h3>

              <p>Total Diagnostic Center</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $count_pending_doc_app?></h3>

              <p>Pending Doctor Appointments</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $count_pending_diag_app?></h3>

              <p>Pending Diagnostic Appointments</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
	  </section>
	  <?php include("user_footer.php")?>