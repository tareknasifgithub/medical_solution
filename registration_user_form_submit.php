<?php
include('db_connect.php');
//echo "<pre>"; print_r($_POST);exit();

$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
if($password != $confirm_password){
	echo "Password and Confirmed Password Not Matched";
	exit();
}
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$phone = $_POST['phone'];
$address = $_POST['address'];


$sql = "INSERT INTO user_info (name, age, email,password,gender,contact,phone,address)
VALUES ('$name', '$age','$email','$password' ,'$gender','$contact','$phone','$address')";

if ($conn->query($sql) === TRUE) {
	$last_id = $conn->insert_id;
	$user_code = $last_id+1000;
	$update_user_code = "update user_info set user_code = $user_code where id = $last_id";

	if ($conn->query($update_user_code) === TRUE) {
		echo "Congratulations! Your registration is successful! " . "Your User Code is ".$user_code ;
	} 
	else {
    	echo "Error updating record: " . $conn->error;
	}
   
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

?>