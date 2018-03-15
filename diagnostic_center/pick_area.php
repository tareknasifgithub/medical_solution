<?php
$region_id = $_POST['region_id'];
 include('../db_connect.php');
 $sql = "select * from tbl_area where region_id = $region_id";
 //echo $sql;exit();
                $result = mysqli_query($conn,$sql);
                if($result){
                if($result->num_rows > 0){
                	$area_name =
                	$return_html = '<option value="select">Select Area</option>';
                  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

                   $return_html = $return_html.'<option value = "'.$row['id'].'">'.$row['area_name'].'</option>';
                }
 echo $return_html;
               
                   }

                          else{

		               	 echo "No Area Selected Under This Region";
		               }
       }


              

                   


?>