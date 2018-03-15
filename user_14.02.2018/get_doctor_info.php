<?php 
include('../db_connect.php');
$doctor_id = $_POST['doctor_id'];

$each_doctor = "SELECT
doctor_info.id,
doctor_info.`name`,
doctor_schedule.non_visiting_day_string,
doctor_schedule.slot_1_start_time,
doctor_credentials.duration_per_patient,
doctor_schedule.reservation_date_from,
doctor_schedule.reservation_date_to
FROM
doctor_info
LEFT JOIN doctor_schedule ON doctor_info.id = doctor_schedule.doctor_id
LEFT JOIN doctor_credentials ON doctor_schedule.doctor_id = doctor_credentials.doctor_id
WHERE doctor_info.id = $doctor_id
";

 $result_each_doctor = mysqli_query($conn,$each_doctor);
                if($result_each_doctor){
                	$row_each_doctor = mysqli_fetch_array($result_each_doctor,MYSQLI_ASSOC);

                	$doctor_id = $row_each_doctor['id'];
                	$doctor_name = $row_each_doctor['name'];
                	$disable_day = $row_each_doctor['non_visiting_day_string'];
                	$start_time = $row_each_doctor['slot_1_start_time'];
                	$interval = $row_each_doctor['duration_per_patient'];
                	$date_from = $row_each_doctor['reservation_date_from'];
                	$date_to = $row_each_doctor['reservation_date_to'];
                	//echo $row_each_doctor['non_visiting_day_string'];

                }
                //else { $disable_day = '0'; $date_from = '0'; $date_to = '0';}

                 $myObj = new stdClass;
                        $myObj->disable_day = $disable_day;
                        $myObj->date_from = $date_from;
                        $myObj->date_to = $date_to;
                        $myJSON = json_encode($myObj);
                        echo $myJSON;
?>