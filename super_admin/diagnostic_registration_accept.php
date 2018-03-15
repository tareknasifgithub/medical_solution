<?php

include('../db_connect.php');
$status = $_GET['status'];
$id = $_GET['id'];
//echo '<pre>'; print_r($_GET); exit;
$sql = "UPDATE `diagnostic_info` SET `status` = $status WHERE `id` = $id";
//echo $sql; exit;
mysqli_query($conn,$sql);
header("location:review_diagnostic_registration.php");
?>
