<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_medical";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO doctor_info (name, designation, email)
VALUES ('Saif', 'Software Engineer', 'saif.hossain@apsissolutions.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>