<?php
include('../db_connect.php');
$doctor_id = $_POST['doctor_id'];
$name = $_POST['name'];
$designation = $_POST['designation'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
if($password != $confirm_password){
	echo "Password and Confirmed Password Not Matched";
	exit();
}
$speciality = $_POST['speciality'];
$specialist_area_id = $_POST['specialist_area_id'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$phone = $_POST['phone'];
$bmdc_reg_no = $_POST['bmdc_reg_no'];
$description = $_POST['description'];
$degree_and_other_specification = $_POST['degree_and_other_specification'];

$check_bmdc_reg_no = "select * from tbl_bmdc_reg_no where bmdc_reg_no = '$bmdc_reg_no'";
$check_bmdc_reg_no_result = mysqli_query($conn,$check_bmdc_reg_no);
if($check_bmdc_reg_no_result->num_rows > 0){
	$status = 1;
	$sql = "UPDATE  doctor_info  set name = '$name', designation = '$designation', email = '$email',password = '$password',speciality = '$speciality',specialist_area_id = $specialist_area_id,gender = '$gender',contact = '$contact',phone = '$phone',bmdc_reg_no = '$bmdc_reg_no',description = '$description',degree_and_other_specification = '$degree_and_other_specification' where id = $doctor_id";

//echo $sql;exit();

if ($conn->query($sql) === TRUE) {

    echo "Your Profile Updated Successfully";
} 

}
else{
	$status = 0;
	echo "Your Profile Not Updated for wrong information!!";
}



$conn->close();

?>