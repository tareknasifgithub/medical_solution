<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Doctor's Login</title>
  
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="login/css/style.css">

  
</head>

<body>

  <div class="login-form">
    <div align = "center"> <img src = "./images/doctor.png" style = "width:40%"></div>
	<h1> Doctor's Login </h1>
  <form class="well form-horizontal" action="login_success.php" method="post"  id="contact_form">
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Username " id="UserName">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" placeholder="Password" id="Password">
       <i class=""></i>
     </div>
      <span class="alert">Invalid Credentials</span>
      <a class="link" href="#">Lost your password?</a>
     <button type="button" class="log-btn" >Log in</button>
   </form>
    <hr>
       <a href = "registration.php"> <button type="button" class="log-btn" >New Here? Register Now</button></a>
    
    
   </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="login/js/index.js"></script>




</body>

</html>

