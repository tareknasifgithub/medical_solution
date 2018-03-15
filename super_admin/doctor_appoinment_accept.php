<?php

include('../db_connect.php');
$schedule_id = $_GET['schedule'];
$stts = $_GET['stts'];
//echo '<pre>'; print_r($_GET); exit;
$sql = "UPDATE `user_schedule_table` SET `status` = $stts WHERE `user_schedule_table`.`id` = $schedule_id";
//echo $sql; exit;
mysqli_query($conn,$sql);
header("location:view_doctor_appointments.php");
?>