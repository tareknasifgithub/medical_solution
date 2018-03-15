<?php
session_start();
include('../db_connect.php');
//echo "<pre>";print_r($_POST);exit();
$select_test = implode(",",array_filter($_POST['select_test']));
//echo $visiting_day; exit();

$input_test = implode(",",array_filter($_POST['input_test']));
$all_test = $input_test.','.$select_test;
$date = date_create($_POST['date']);
$date = $date->format('Y-m-d');

$doctor_id = $_SESSION['doctor_id'];
//echo $slot_1_start_time;exit();
$doctor_name = $_POST['doctor_name'];
$patient_name = $_POST['patient_name'];
$age = $_POST['age'];
$medicine = $_POST['medicine'];


$insert_sql = "INSERT INTO user_prescription_history (doctor_id,doctor_name,user_name, age,`date`,test_name,medicine)
					VALUES ($doctor_id,'$doctor_name','$patient_name','$age','$date','$all_test','$medicine')";

					if ($conn->query($insert_sql) === TRUE) {
					    echo "Prescription inserted successfully";
					} else {
					    echo "Error: " . $insert_sql . "<br>" . $conn->error;
					}

$conn->close();

?>