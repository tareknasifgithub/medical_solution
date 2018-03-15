<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_medical";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// sql to create table
$sql = "CREATE TABLE doctor_info(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
designation VARCHAR(30) NOT NULL,
speciality VARCHAR(30) NOT NULL,
gender VARCHAR(30) NOT NULL,
contact VARCHAR(30) NOT NULL,
phone VARCHAR(30) NOT NULL,
bmdc_reg_no VARCHAR(30) NOT NULL,
password VARCHAR(50) NOT NULL,
description VARCHAR(500) NOT NULL,
degree_and_other_specification VARCHAR(500) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>