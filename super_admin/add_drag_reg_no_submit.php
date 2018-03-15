<?php
session_start();
include('../db_connect.php');
//echo "<pre>";print_r($_POST);exit();
$drag_reg_no = $_POST['drag_reg_no'];

$check_row = "select drag_reg_no from tbl_drag_reg_no where drag_reg_no = '$drag_reg_no'";
$result = mysqli_query($conn,$check_row);
    if($result->num_rows > 0){
    	echo "Already Exists! Insert Another...";
    	exit();
    }
    else
    {
		$insert_sql = "INSERT INTO tbl_drag_reg_no (drag_reg_no)
		VALUES ('$drag_reg_no')";

		if ($conn->query($insert_sql) === TRUE) {
		    echo "New Drag Reg No inserted successfully";
		} else {
		    echo "Error: " . $insert_sql . "<br>" . $conn->error;
		}


		$conn->close();


    }



?>