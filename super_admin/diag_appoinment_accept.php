<?php

include('../db_connect.php');
$schedule_id = $_GET['schedule'];
$diagnostic_id = $_GET['diagnostic_id'];
$date = $_GET['date'];
$stts = $_GET['stts'];
if($stts == 1){
	 $serial_no_query = "select count('id') as serial_no from user_diag_schedule_table where date = '$date' and diagnostic_id = $diagnostic_id and status = 1";
	 //echo $serial_no_query; exit();
				 $serial_no = mysqli_fetch_object(mysqli_query($conn,$serial_no_query))->serial_no;
				 $serial_no = $serial_no +1;

				 $sql = "UPDATE `user_diag_schedule_table` SET `serial_no` = $serial_no WHERE `user_diag_schedule_table`.`id` = $schedule_id";
				 mysqli_query($conn,$sql);
//echo $sql; exit;
mysqli_query($conn,$sql);
}
//echo '<pre>'; print_r($_GET); exit;
$sql = "UPDATE `user_diag_schedule_table` SET `status` = $stts WHERE `user_diag_schedule_table`.`id` = $schedule_id";
//echo $sql; exit;
mysqli_query($conn,$sql);
header("location:view_diag_appointments.php");
?>