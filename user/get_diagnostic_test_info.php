<?php
//echo "Thanks";exit();
include('../db_connect.php');
$diagnostic_id = $_POST['diagnostic_id'];
$each_diagnostic = "SELECT
        diagnostic_info.id,
        diagnostic_info.`name`,
        diagnostic_schedule.non_visiting_day_string,
        diagnostic_schedule.slot_1_start_time,
        diagnostic_schedule.reservation_date_from,
        diagnostic_schedule.reservation_date_to
FROM
        diagnostic_info
INNER JOIN diagnostic_schedule ON diagnostic_info.id = diagnostic_schedule.diagnostic_id
INNER JOIN diagnostic_credentials ON diagnostic_schedule.diagnostic_id = diagnostic_credentials.diagnostic_id
WHERE
        diagnostic_info.id = $diagnostic_id
";
//echo $each_diagnostic; exit();
$result_each_diagnostic = mysqli_query($conn,$each_diagnostic);
if($result_each_diagnostic->num_rows > 0){
	$row_each_diagnostic = mysqli_fetch_array($result_each_diagnostic,MYSQLI_ASSOC);

	$diagnostic_id = $row_each_diagnostic['id'];
	$diagnostic_name = $row_each_diagnostic['name'];
	$disable_day = $row_each_diagnostic['non_visiting_day_string'];
	$start_time = $row_each_diagnostic['slot_1_start_time'];
	$date_from = $row_each_diagnostic['reservation_date_from'];
	$date_to = $row_each_diagnostic['reservation_date_to'];
	//echo $row_each_diagnostic['non_visiting_day_string'];
}
$all_test = "select * from all_test where diagnostic_id = $diagnostic_id";
 $result_all_test = mysqli_query($conn,$all_test);
  $return_html = '';

                if($result_all_test->num_rows > 0){
                   while($row_result_all_test = mysqli_fetch_array($result_all_test,MYSQLI_ASSOC)) {
                        $test_id = $row_result_all_test['id'];
                        $test_name = $row_result_all_test['test_name'];
                        $return_html = $return_html.'<input name="selector[]" id="checkBox'.$test_id.'" class="selected_test" type="checkbox" value="'.$test_id.'" /> '.$test_name.'<br>';
                }

        }

                        $myObj = new stdClass;
                        $myObj->disable_day = $disable_day;
                        $myObj->diagnostic_name = $diagnostic_name;
                        $myObj->all_test_info = $return_html;
                        $myJSON = json_encode($myObj);
                        echo $myJSON;

?>