<?php
include('../db_connect.php');
 //print_r($_POST); exit;

	$diagnostic_id = $_POST['diagnostic_id'];
	$test_id = $_POST['test_id'];
	$user_id = $_POST['user_id'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$date = $_POST['date'];
	$trxid = $_POST['trxid'];
	 $serial_no_query = "select count('id')as serial_no from user_diag_schedule_table where date = '$date' and status = 1";
				 $serial_no = mysqli_fetch_object(mysqli_query($conn,$serial_no_query))->serial_no;
	
				$insert_sql = "INSERT INTO user_diag_schedule_table (diagnostic_id,test_id,user_id,`date`,start_time,end_time,serial_no,status)
				VALUES ($diagnostic_id,$test_id,$user_id,'$date','$start_time','$end_time','$serial_no',0)";

				if ($conn->query($insert_sql) === TRUE) {
				   	    $_SESSION['msg'] = "Appointment Request Submission successfully.Thank You. Wait For the Confirmation";



				
	    header("location:diagnostic_appointment_status.php");
				} else {
				    echo "Error: " . $insert_sql . "<br>" . $conn->error;
				}
 	



?>