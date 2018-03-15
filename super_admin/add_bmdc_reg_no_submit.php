<?php
session_start();
include('../db_connect.php');
//echo "<pre>";print_r($_POST);exit();
$bmdc_reg_no = $_POST['bmdc_reg_no'];

$check_row = "select bmdc_reg_no from tbl_bmdc_reg_no where bmdc_reg_no = '$bmdc_reg_no'";
$result = mysqli_query($conn,$check_row);
    if($result->num_rows > 0){
    	echo "Already Exists! Insert Another...";
    	exit();
    }
    else
    {
		$insert_sql = "INSERT INTO tbl_bmdc_reg_no (bmdc_reg_no)
		VALUES ('$bmdc_reg_no')";

		if ($conn->query($insert_sql) === TRUE) {
		    echo "New BMDC Reg No inserted successfully";
		} else {
		    echo "Error: " . $insert_sql . "<br>" . $conn->error;
		}


		$conn->close();


    }



?>