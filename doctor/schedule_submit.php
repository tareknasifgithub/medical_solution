<?php
session_start();
include('../db_connect.php');
//echo "<pre>";print_r($_POST);exit();
//$visiting_day = implode(",",array_filter($_POST['select_day']));
 //echo $visiting_day;
$all_day = ['0','1','2','3','4','5','6'];
$visieted_day_array = array_filter($_POST['select_day'],'is_numeric');
$non_visieted_day_array = array_diff($all_day, $visieted_day_array);
$reservation_range = explode("-", $_POST['reservation']);

$doctor_id = $_SESSION['doctor_id'];
$visiting_day_string = implode(",",$visieted_day_array);
$non_visiting_day_string= implode(",",$non_visieted_day_array);
$reservation_date_from = $reservation_range[0];
$reservation_date_from = date_create($reservation_date_from);
$reservation_date_from = $reservation_date_from->format('Y-m-d');

$reservation_date_to = $reservation_range[1];
$reservation_date_to = date_create($reservation_date_to);
$reservation_date_to = $reservation_date_to->format('Y-m-d');

$slot_1_start_time = $_POST['slot_1_start_time'];
//echo $slot_1_start_time;exit();
$slot_1_end_time = $_POST['slot_1_end_time'];
$slot_2_start_time = $_POST['slot_2_start_time'];
$slot_2_end_time = $_POST['slot_2_end_time'];
$slot_3_start_time = $_POST['slot_3_start_time'];
$slot_3_end_time = $_POST['slot_3_end_time'];


$check_row = "select * from doctor_schedule where doctor_id = $doctor_id";

 $result = mysqli_query($conn,$check_row);
        //echo "<pre>"; print_r($result->num_rows);exit();
        if($result->num_rows == 1)
        	{
				$update_row = "update doctor_schedule set visiting_day_string = '$visiting_day_string', non_visiting_day_string = '$non_visiting_day_string', reservation_date_from = '$reservation_date_from', reservation_date_to = '$reservation_date_to', slot_1_start_time = '$slot_1_start_time', slot_1_end_time ='$slot_1_end_time', slot_2_start_time = '$slot_2_start_time', slot_2_end_time = '$slot_2_end_time', slot_3_start_time = '$slot_3_start_time', slot_3_end_time = '$slot_3_end_time' WHERE doctor_id = $doctor_id";

				if ($conn->query($update_row) === TRUE) {
					    echo "Schedule Updated successfully";
					} else {
					    echo "Error: " . $update_row . "<br>" . $conn->error;
					}

			}
			else{
					$insert_sql = "INSERT INTO doctor_schedule (doctor_id,visiting_day_string, non_visiting_day_string,reservation_date_from,reservation_date_to,slot_1_start_time,slot_1_end_time,slot_2_start_time,slot_2_end_time,slot_3_start_time,slot_3_end_time)
					VALUES ($doctor_id,'$visiting_day_string','$non_visiting_day_string','$reservation_date_from','$reservation_date_to','$slot_1_start_time','$slot_1_end_time','$slot_2_start_time','$slot_2_end_time','$slot_3_start_time','$slot_3_end_time')";

					if ($conn->query($insert_sql) === TRUE) {
					    echo "Schedule inserted successfully";
					} else {
					    echo "Error: " . $insert_sql . "<br>" . $conn->error;
					}


			}


$conn->close();

?>