<?php
include('../db_connect.php');?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php

//echo "<pre>";print_r($_POST);exit();
$target_dir = "images/";
$target_file = $target_dir. basename($_FILES["fileToUpload"]["name"]);
//echo $target_file; exit;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$schedule_id = $_POST['schedule_id'];
$user_id = $_POST['user_id'];
$doctor_id = $_POST['doctor_id'];
$diagnostic_id = $_POST['diagnostic_id'];
$image = $target_file;
$date = date('Y-m-d');

$sql = "INSERT INTO `user_prescription_history` (`user_id`, `diagnostic_id`, `doctor_id`,`image`, `date`) VALUES ($user_id, $diagnostic_id, $doctor_id,'$target_file', '$date')";
//echo $sql;
mysqli_query($conn,$sql);
$sql2=("UPDATE `user_schedule_table` SET `status` = '3' WHERE `user_schedule_table`.`id` = $schedule_id;"); 
mysqli_query($conn,$sql2);
header("location:view_appointments.php");


