<?php 

		include('db_connect.php');
        session_start();
        $phone=$_POST['phone'];
        //$password=md5($_POST['password']);
        $password=$_POST['password'];
        $sql = "select * from doctor_info where phone = '$phone' and password = '$password'";
        //echo $sql;exit();
        $result = mysqli_query($conn,$sql);
        //echo "<pre>"; print_r($result->num_rows);exit();
        if($result->num_rows == 1){

        	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        	if($row){
	        	$_SESSION['doctor_id'] =  $row["id"];
	        	$_SESSION['doctor_phone'] =  $row["phone"];
	        	$_SESSION['doctor_contact'] =  $row["contact"];
	        	$_SESSION['doctor_name'] =  $row["name"];
	        	//echo $_SESSION['name'];
                header('Location: ./doctor/index.php');

        		
        	}
            else
            {
                 header('Location: login.php');
                 //echo "Invalid Phone No or Password";
            }


        }
        else
        {
            header('Location: login.php');
        	//echo "Invalid Phone No or Password";
        }



       ?>