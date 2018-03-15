<?php
session_start();
include('../db_connect.php');
//echo "<pre>";print_r($_POST);exit();
$region_id = $_POST['region_id'];
$area_name = $_POST['area_name'];

$check_row = "select region_id,area_name from tbl_area where area_name = '$area_name' and region_id = $region_id";
//echo $check_row;exit();
$result = mysqli_query($conn,$check_row);
    if($result->num_rows > 0){
    	echo "Already Exists! Insert Another...";
    	exit();
    }
    else
    {
		$insert_sql = "INSERT INTO tbl_area (region_id,area_name)
		VALUES ('$region_id','$area_name')";

		if ($conn->query($insert_sql) === TRUE) {
		    echo "New Area inserted successfully";
		} else {
		    echo "Error: " . $insert_sql . "<br>" . $conn->error;
		}


		$conn->close();


    }



?>