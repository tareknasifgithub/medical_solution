<?php
include('db_connect.php');
//echo "<pre>"; print_r($_POST);exit();

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

	$sql = "INSERT INTO diagnostic_info (name, phone, email,password,contact,address,status)
	VALUES ('$name', '$phone','$email','$password','$contact','$address','$status')";

	if ($conn->query($sql) === TRUE) {
	    echo "Congratulations! Your registration is successful";
	}
}

else {
    $status = 0;
	echo "Your Registration Failed for wrong information!!";
}


$conn->close();

?>