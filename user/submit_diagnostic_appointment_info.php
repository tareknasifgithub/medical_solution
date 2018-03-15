<?php
include('../db_connect.php');
 //print_r($_POST); exit;

	$diagnostic_id = $_POST['diagnostic_id'];
	$test_id = $_POST['test_id'];
	$user_id = $_POST['user_id'];
	$date = $_POST['date'];
	$cost = $_POST['cost'];
	$trxid = $_POST['trxid'];

	
				$insert_sql = "INSERT INTO user_diag_schedule_table (diagnostic_id,test_id,user_id,`date`,serial_no,status,trxid,cost)
				VALUES ($diagnostic_id,'$test_id',$user_id,'$date',0,0,'$trxid','$cost')";

				if ($conn->query($insert_sql) === TRUE) {
				   	    $_SESSION['msg'] = "Appointment Request Submission successfully.Thank You. Wait For the Confirmation";



				
	    header("location:diagnostic_appointment_status.php");
				} else {
				    echo "Error: " . $insert_sql . "<br>" . $conn->error;
				}
 	



?>