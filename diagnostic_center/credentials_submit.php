<?php
session_start();
include('../db_connect.php');
//echo "<pre>";print_r($_POST);exit();
$diagnostic_id = $_SESSION['diagnostic_id'];
$region = $_POST['region'];
$area = $_POST['area'];
$location_details = $_POST['location_details'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];

$check_row = "select * from diagnostic_credentials where diagnostic_id = $diagnostic_id";

 $result = mysqli_query($conn,$check_row);
        //echo "<pre>"; print_r($result->num_rows);exit();
        if($result->num_rows == 1)
        	{
				$update_row = "update diagnostic_credentials set region = $region, area = $area, location_details = '$location_details', longitude = $longitude, latitude = $latitude WHERE diagnostic_id = $diagnostic_id";
				//echo $update_row;exit();

				if ($conn->query($update_row) === TRUE) {
					    echo "Credentials Updated successfully";
					} else {
					    echo "Error: " . $update_row . "<br>" . $conn->error;
					}

			}
			else{
					$insert_sql = "INSERT INTO diagnostic_credentials (diagnostic_id,region, area,location_details,longitude,latitude)
					VALUES ($diagnostic_id,$region,$area,'$location_details',$longitude,$latitude)";
					//echo $insert_sql;exit();

					if ($conn->query($insert_sql) === TRUE) {
					    echo "Credentials inserted successfully";
					} else {
					    echo "Error: " . $insert_sql . "<br>" . $conn->error;
					}


			}


$conn->close();

?>