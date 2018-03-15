<?php 
 session_start();
unset($_SESSION["doctor_name"]);
unset($_SESSION["doctor_id"]);
unset($_SESSION["doctor_phone"]);
unset($_SESSION["doctor_contact"]);

header('Location: index.php');

?>

