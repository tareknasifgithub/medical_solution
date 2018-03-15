<?php
//echo "Thanks";exit();
include('../db_connect.php');
$diagnostic_id = $_POST['diagnostic_id'];
$each_diagnostic = "SELECT
        diagnostic_info.id,
        diagnostic_info.`name`
FROM
        diagnostic_info`
WHERE
        diagnostic_info.id = $diagnostic_id
";
//echo $each_diagnostic; exit();
$result_each_diagnostic = mysqli_query($conn,$each_diagnostic);
if($result_each_diagnostic->num_rows > 0){
	$row_each_diagnostic = mysqli_fetch_array($result_each_diagnostic,MYSQLI_ASSOC);

	$diagnostic_id = $row_each_diagnostic['id'];
	$diagnostic_name = $row_each_diagnostic['name'];
	//echo $row_each_diagnostic['non_visiting_day_string'];
}
$all_test = "select * from all_test where diagnostic_id = $diagnostic_id";
 $result_all_test = mysqli_query($conn,$all_test);

                if($result_all_test->num_rows > 0){
                $return_html = '<option value="select">Select Test</option>';
                   while($row_result_all_test = mysqli_fetch_array($result_all_test,MYSQLI_ASSOC)) {
                        $test_id = $row_result_all_test['id'];
                        $test_name = $row_result_all_test['test_name'];
                        $return_html = $return_html.'<option  value = "'.$test_id.'">'.$test_name.'</option>';
                }

        }

                        $myObj = new stdClass;
                        $myObj->all_test_info = $return_html;
                        $myObj->diagnostic_name = $diagnostic_name;
                        $myJSON = json_encode($myObj);
                        echo $myJSON;

?>