<?php
session_start();
include('../db_connect.php');
//echo "<pre>";print_r($_POST);exit();
$region_name = $_POST['region_name'];

$check_row = "select region_name from tbl_region where region_name = '$region_name'";
$result = mysqli_query($conn,$check_row);
    if($result->num_rows > 0){
    	echo "Already Exists! Insert Another...";
    	exit();
    }
    else
    {
		$insert_sql = "INSERT INTO tbl_region (region_name)
		VALUES ('$region_name')";

		if ($conn->query($insert_sql) === TRUE) {
		    echo "New Region inserted successfully";
		} else {
		    echo "Error: " . $insert_sql . "<br>" . $conn->error;
		}


		$conn->close();


    }



?>