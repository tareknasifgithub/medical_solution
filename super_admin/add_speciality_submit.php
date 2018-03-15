<?php
session_start();
include('../db_connect.php');
//echo "<pre>";print_r($_POST);exit();
$specialist_area = $_POST['specialist_area'];
$icon_name = $_POST['icon_name'];

$check_row = "select specialist_area from doctor_specialist_area where specialist_area = '$specialist_area'";
$result = mysqli_query($conn,$check_row);
    if($result->num_rows > 0){
    	echo "Already Exists! Insert Another...";
    	exit();
    }
    else
    {
		$insert_sql = "INSERT INTO doctor_specialist_area (specialist_area,icon_name)
		VALUES ('$specialist_area','$icon_name')";

		if ($conn->query($insert_sql) === TRUE) {
		    echo "New Specialist Area inserted successfully";
		} else {
		    echo "Error: " . $insert_sql . "<br>" . $conn->error;
		}


		$conn->close();


    }



?>