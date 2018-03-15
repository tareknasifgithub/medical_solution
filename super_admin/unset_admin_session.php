<?php 
 session_start();
unset($_SESSION["admin_name"]);
unset($_SESSION["admin_id"]);
unset($_SESSION["admin_contact"]);

header('Location: ../index.php');

?>

