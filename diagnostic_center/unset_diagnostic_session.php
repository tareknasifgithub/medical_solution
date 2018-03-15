<?php 
 session_start();
unset($_SESSION["diagnostic_contact"]);
unset($_SESSION["diagnostic_id"]);
unset($_SESSION["diagnostic_name"]);

header('Location: index.php');

?>

