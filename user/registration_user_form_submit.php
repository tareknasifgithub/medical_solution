<?php
include('../db_connect.php');
//echo "<pre>"; print_r($_POST);exit();

$user_id = $_POST['user_id'];
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


$sql = "UPDATE  user_info set name = '$name', age = '$age', email = '$email',password = '$password',gender = '$gender',contact = '$contact',phone = '$phone',address= '$address' where id = $user_id";

if ($conn->query($sql) === TRUE) {

		echo "Your Profile  is Updated!";
	}


$conn->close();

?>