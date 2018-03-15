<?php include('../db_connect.php');

//print_r($_POST);exit();

$test_name = $_POST['test_name'];
$test_details = $_POST['test_details'];
$sql = "INSERT INTO `sample_test` ( `test_name`, `test_details`,`status`) 
	VALUES ( '$test_name', '$test_details',1) ";
	//echo $sql; exit;
mysqli_query($conn,$sql);

header("location:all_test.php"); ?>