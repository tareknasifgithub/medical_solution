<?php
session_start();
include('../db_connect.php');

//echo '<pre>'; print_r($_POST); exit;
	$doctor_id = $_POST['doctor_id'];
	$user_id = $_POST['user_id'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$date = $_POST['date'];
	$trxid = $_POST['trxid'];

	$insert_sql = "INSERT INTO user_schedule_table (doctor_id,user_id,`date`,start_time,end_time,status)
	VALUES ($doctor_id,$user_id,'$date','$start_time','$end_time',0)";

	if ($conn->query($insert_sql) === TRUE) {
		$_SESSION['date'] = $_POST['date'];
	    $_SESSION['msg'] = "Appointment Request Submitted successfully.Thank You. Wait For the Confirmation";
	    header("location:doctor_appointment_status.php");
	} 
	else {
	    echo "Error: " . $insert_sql . "<br>" . $conn->error;
	    unset($_SESSION["msg"]);
	}


?>