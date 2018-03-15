<?php include('../db_connect.php');

//print_r($_POST);exit();

$test_name = $_POST['test'];
$test_code = $_POST['test_code'];
$cost = $_POST['cost'];
$duration_per_test = $_POST['duration_per_test'];
$test_details = $_POST['test_details'];
$commission = $_POST['commission'];
$diagnostic_id = $_POST['diagnostic_id'];
$sql = "INSERT INTO `all_test` ( `test_name`,`test_code`, `test_details`, `cost`,`duration_per_test`, `commission`, `diagnostic_id`) 
	VALUES ( '$test_name','$test_code', '$test_details', '$cost','$duration_per_test', '$commission', '$diagnostic_id') ";
	//echo $sql; exit;
mysqli_query($conn,$sql);

header("location:all_test.php"); ?>