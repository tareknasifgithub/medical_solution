<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
session_start();
include('db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title> Medical Care </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Medical Care a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!-- flexslider-css-file -->
<link rel="stylesheet" href="./css/flexslider.css" type="text/css" media="screen" property="" />
<!-- //flexslider-css-file -->

<link rel="stylesheet" href="./css/easy-responsive-tabs.css">


<link href="./css/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons-css-file -->
<link href="./css/bootstrap.css" type="text/css" rel="stylesheet" media="all">	<!-- bootstrap-css-file -->
<link href="./css/style.css" type="text/css" rel="stylesheet" media="all">	<!-- style-css-file -->

<!-- gallery -->
<link rel="stylesheet" href="./css/lightbox.css">
<!-- //gallery -->

<!-- fonts -->
 <link href="//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet">
 <link href="//fonts.googleapis.com/css?family=Cinzel:400,700,900" rel="stylesheet">
       <link rel="stylesheet" href="login/css/style.css">
 <!-- //fonts -->
<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
<!-- //Default-JavaScript-File -->

<script src="./js/bootstrap.js"></script>	<!-- //bootstrap-JavaScript-File -->
		
</head>
<!-- Head -->


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	<!-- banner -->
	<div id="home" class="w3ls-banner"> 
		<!-- header -->
		<div class="header-w3layouts"> 
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-fixed-top"> 
				<div class="container">
					<div class="navbar-header page-scroll">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Medical_care</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a class="navbar-brand" href="index.php">Medical Care</a></h1>
					</div> 
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav navbar-right cl-effect-15">
							<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
							<li class="hidden"><a class="page-scroll" href="#page-top"></a>	</li>
							<li><a class="" href="index.php">Home</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login/SignUp <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a class=""  href="#loginModalAdmin" class="w3more" data-toggle="modal">Admin</a></li>
									<li><a class=""  href="#loginModal" class="w3more" data-toggle="modal">Doctor</a></li>
									<li><a class=""  href="#loginModalUser" class="w3more" data-toggle="modal">User</a></li>
									<li><a class=""  href="#loginModalDiagnostic" class="w3more" data-toggle="modal">Diagnostic</a></li>
								</ul>
							</li>
							<li><a class="" href="contact.php">Contact</a></li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>  
		</div>	
		<!-- //header -->


	<!-- modal --><!-- for pop up -->
<div class="modal about-modal fade" id="loginModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="span2" aria-hidden="true">&times;</span></button>						
				<h3 class="modal-title">Login </h3>
			</div> 
		<div class="modal-body">

			<div align = "center"> <img src = "./images/doctor.png" style = "width:40%"></div>
			<h1> Doctor's Login </h1>
<form class="well form-horizontal" action="login_check.php" method="post"  id="contact_form">
			    <div class="form-group ">
       <input type="text" name = "phone" class="form-control" placeholder="Phone (11 digit) " id="phone">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" name = "password" class="form-control" placeholder="Password" id="password">
       <i class="fa fa-lock"></i>
     </div>
      <span class="alert">Invalid Credentials</span>
      <a class="link" href="#">Lost your password?</a>
     <button type="submit" id= "login1" class="log-btn" >Log in</button>
 </form>
    <hr>
       <a href = "registration.php"> <button type="button" class="log-btn" >New Here? Register Now</button></a>

		</div>


		</div>
	</div>
	  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</div>

<!-- //modal --><!-- //for pop up -->	

<!-- modal --><!-- for pop up -->
<div class="modal about-modal fade " id="loginModalUser" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="span2" aria-hidden="true">&times;</span></button>						
				<h3 class="modal-title">Login </h3>
			</div> 
		<div class="modal-body">

			<div align = "center"> <img src = "./images/doctor.png" style = "width:40%"></div>
			<h1> User's Login </h1>
<form class="well form-horizontal" action="user_login_check.php" method="post"  id="contact_form">
			    <div class="form-group ">
       <input type="text" name = "contact" class="form-control" placeholder="Phone (11 digit) " id="phone">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" name = "password" class="form-control" placeholder="Password" id="password">
       <i class="fa fa-lock"></i>
     </div>
      <span class="alert">Invalid Credentials</span>
      <a class="link" href="#">Lost your password?</a>
     <button type="submit" id= "login1" class="log-btn" >Log in</button>
 </form>
    <hr>
       <a href = "registration_user.php"> <button type="button" class="log-btn" >New Here? Register Now</button></a>

		</div>
		</div>
	</div>
	  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</div>
<!-- //modal --><!-- //for pop up -->


<!-- modal --><!-- for pop up -->
<div class="modal about-modal fade " id="loginModalAdmin" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="span2" aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Login </h3>
			</div> 
		<div class="modal-body">

			<div align = "center"> <img src = "./images/doctor.png" style = "width:40%"></div>
			<h1> Admin's Login </h1>
<form class="well form-horizontal" action="admin_login_check.php" method="post"  id="contact_form">
			    <div class="form-group ">
       <input type="text" name = "contact" class="form-control" placeholder="Phone (11 digit) " id="phone">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" name = "password" class="form-control" placeholder="Password" id="password">
       <i class="fa fa-lock"></i>
     </div>
      <span class="alert">Invalid Credentials</span>
      <a class="link" href="#">Lost your password?</a>
     <button type="submit" id= "login1" class="log-btn" >Log in</button>
 </form>
    <hr>
		</div>
		</div>
	</div>
	  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</div>
<!-- //modal --><!-- //for pop up -->

<!-- modal --><!-- for pop up -->
<div class="modal about-modal fade " id="loginModalDiagnostic" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="span2" aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Login </h3>
			</div> 
		<div class="modal-body">

			<div align = "center"> <img src = "./images/doctor.png" style = "width:40%"></div>
			<h1> Admin's Login </h1>
<form class="well form-horizontal" action="diagnostic_login_check.php" method="post"  id="contact_form">
			    <div class="form-group ">
       <input type="text" name = "contact" class="form-control" placeholder="Phone (11 digit) " id="phone">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" name = "password" class="form-control" placeholder="Password" id="password">
       <i class="fa fa-lock"></i>
     </div>
      <span class="alert">Invalid Credentials</span>
      <a class="link" href="#">Lost your password?</a>
     <button type="submit" id= "login1" class="log-btn" >Log in</button>
 </form>
    <hr>
       <a href = "registration_diagnostic.php"> <button type="button" class="log-btn" >New Here? Register Now</button></a>
		</div>
		</div>
	</div>
	  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</div>
<!-- //modal --><!-- //for pop up -->

