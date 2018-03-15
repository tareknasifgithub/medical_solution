<?php
session_start();
include('../db_connect.php');
//echo "<pre>";print_r($_POST);exit();
$doctor_id = $_SESSION['doctor_id'];
$region = $_POST['region'];
$area = $_POST['area'];
$location_details = $_POST['location_details'];
$new_patient_fee = $_POST['new_patient_fee'];
$returning_patient_fee = $_POST['returning_patient_fee'];
$duration_per_patient = $_POST['duration_per_patient'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];

$check_row = "select * from doctor_credentials where doctor_id = $doctor_id";

 $result = mysqli_query($conn,$check_row);
        //echo "<pre>"; print_r($result->num_rows);exit();
        if($result->num_rows == 1)
        	{
				$update_row = "update doctor_credentials set region = $region, area = $area, location_details = '$location_details', new_patient_fee = $new_patient_fee, returning_patient_fee = '$returning_patient_fee', duration_per_patient = '$duration_per_patient', longitude = $longitude, latitude = $latitude WHERE doctor_id = $doctor_id";
				//echo $update_row;exit();

				if ($conn->query($update_row) === TRUE) {
					    echo "Credentials Updated successfully";
					} else {
					    echo "Error: " . $update_row . "<br>" . $conn->error;
					}

			}
			else{
					$insert_sql = "INSERT INTO doctor_credentials (doctor_id,region, area,location_details,new_patient_fee,returning_patient_fee,duration_per_patient,longitude,latitude)
					VALUES ($doctor_id,$region,$area,'$location_details',$new_patient_fee,$returning_patient_fee,$duration_per_patient,$longitude,$latitude)";
					//echo $insert_sql;exit();

					if ($conn->query($insert_sql) === TRUE) {
					    echo "Credentials inserted successfully";
					} else {
					    echo "Error: " . $insert_sql . "<br>" . $conn->error;
					}


			}


$conn->close();

?>