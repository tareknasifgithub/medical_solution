<!DOCTYPE html>
<?php
include('../db_connect.php');
session_start();

 if(!isset($_SESSION['user_id'])){  header('Location: ../index.php');
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../asset/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../asset/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>User Panel</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"  style="font-size: 25px;"><?php if(isset($_SESSION['user_id'])){echo $_SESSION['user_name']; } ?></span>
            </a>
          </li>
           <li class="dropdown user user-menu">
            <a href="unset_user_session.php" class="dropdown-toggle" >
              <span class="hidden-xs">Signout  <i class="fa fa-sign-out" title="Logout" style="font-size: 30px;"></i></span>
            </a>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="user_credentials.php"><i class="fa fa-circle-o"></i> Credentials</a></li>
            
           
            <li><a href="doctor_appointment.php"><i class="fa fa-circle-o"></i>New Dr Appointment </a></li>
            <li><a href="doctor_appointment_status.php"><i class="fa fa-circle-o"></i>Dr Appointment Status</a></li>
            <li><a href="prescription_history.php"><i class="fa fa-circle-o"></i> Prescription History </a></li>
             <li><a href="diagnostic_appointment.php"><i class="fa fa-circle-o"></i>New Diagnostic Appointment </a></li>
             <li><a href="diagnostic_appointment_status.php"><i class="fa fa-circle-o"></i>Diagnostic Appointment Status</a></li>
			      <li><a href="diagnostic_history.php"><i class="fa fa-circle-o"></i> Diagnostic History </a></li>
            <!-- <li><a href="index2.html"><i class="fa fa-circle-o"></i> Change Image</a></li>
            <li><a href="user_change_password.php"><i class="fa fa-circle-o"></i> Change Password</a></li> -->
          </ul>
        </li>
       
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      
    </section>
	 <section class="content">
    <!-- Main content -->
    
    <!-- /.content -->
 
  <!-- /.content-wrapper -->
