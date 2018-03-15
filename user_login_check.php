<?php
		include('db_connect.php');
        session_start();
        $contact=$_POST['contact'];
        //$password=md5($_POST['password']);
        $password=$_POST['password'];
        $sql = "select * from user_info where contact = '$contact' and password = '$password'";
        //echo $sql;exit();
        $result = mysqli_query($conn,$sql);
        //echo "<pre>"; print_r($result->num_rows);exit();
        if($result->num_rows == 1){

        	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        	if($row){
	        	$_SESSION['user_id'] =  $row["id"];
	        	$_SESSION['user_contact'] =  $row["contact"];
	        	$_SESSION['user_name'] =  $row["name"];	        	
                header('Location: ./user/index.php');

        		
        	}
            else
            {
                 header('Location: index.php');
            }


        }
        else
        {
            header('Location: index.php');
        	//echo "Invalid Phone No or Password";
        }



       ?>