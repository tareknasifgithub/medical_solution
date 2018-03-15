<?php
include('../db_connect.php');
//echo "<pre>"; print_r($_POST);exit();

$diagnostic_id = $_POST['diagnostic_id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$drag_reg_no = $_POST['drag_reg_no'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
if($password != $confirm_password){
	echo "Password and Confirmed Password Not Matched";
	exit();
}
$contact = $_POST['contact'];
$address = $_POST['address'];
$check_drag_reg_no = "select * from tbl_drag_reg_no where drag_reg_no = '$drag_reg_no'";
$check_drag_reg_no_result = mysqli_query($conn,$check_drag_reg_no);
if($check_drag_reg_no_result){
	$status = 1;

	$sql = "UPDATE  diagnostic_info set  name = '$name', phone = '$phone', email = '$email',password = '$password',contact = '$contact',address = '$address' where id = $diagnostic_id";

	if ($conn->query($sql) === TRUE) {
	    echo " Your Information Updated Successfully";
	}
}

else {
    $status = 0;
	echo "Your Information Not Updated for wrong information!!";
}


$conn->close();

?>