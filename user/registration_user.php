 <?php 
 include('../db_connect.php');
 include('user_header.php');

$user_id = $_SESSION['user_id'];
$sql = "select * from user_info where id = $user_id";
$result = mysqli_query($conn,$sql);
                if($result){
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        }
 ?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>Medical Care </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Medical Care a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
   <style>#success_message{ display: none;}   
 </style>

 <style type="text/css">.header-shadow {
    background-image: url('./images/b.jpg');
    
}</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="container header-shadow" id="services">

    <form class="well form-horizontal" action="registration_form_submit.php" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Profile</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label"> Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="name" id = "name" value = "<?php echo $row['name'];?>" placeholder="Name" class="form-control"  type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label"> Age</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="age" id = "age" value = "<?php echo $row['age'];?>" placeholder="Age" class="form-control"  type="text">
    </div>
  </div>
</div>
<!-- Text input-->



<div class="form-group"> 
  <label class="col-md-4 control-label">Gender</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="gender" id = "gender" class="form-control selectpicker">
      <option value="">Select your Gender</option>  
       <option value="male" <?php if($row['gender'] == 'male'){echo 'selected = "selected"';}?> >Male</option> 
       <option  value="female" <?php if($row['gender'] == 'female'){echo 'selected = "selected"';}?>>Female</option>             
    </select>
  </div>
</div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Phone No.</label>   <span><button type="button" id = "get_code" class="btn btn-success" >Get Code <span class="glyphicon glyphicon-send"></span></button></span>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="contact" id = "phone" placeholder="(880)" class="form-control" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Verification Code</label>  <span id = "status_icon" class=""></span>
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
    
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="verification_code" id = "verification_code" placeholder="Verification Code" class="form-control"  type="text"> 

    </div>

  </div>
</div>

  <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" id = "email" value = "<?php echo $row['email'];?>" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label">Contact No.</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="contact" id = "contact" value = "<?php echo $row['contact'];?>" placeholder="(880)" class="form-control" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Address</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <textarea name="address" id = "address" placeholder="" class="form-control"  type="text"><?php echo $row['address'];?></textarea>
    </div>
  </div>
</div>
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="password" id = "password" value = "<?php echo $row['password'];?>" placeholder="Password" class="form-control"  type="password">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Confirm Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="password" id = "confirm_password" value = "<?php echo $row['password'];?>" placeholder="Confirm Password" class="form-control"  type="password">
    </div>
  </div>
</div>
<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button type="button" id = "sign_up_button_user" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
  </body>
  </html>

    
<script type="text/javascript">


  $(document).ready(function() {
    $("#sign_up_button_user").click(function(){
      if(form_validation())
      {
        //alert("validation true");
        
        var user_id = <?php echo $user_id?>;
        var name = $('#name').val().trim();
        var age = $('#age').val().trim();
        var gender = $('#gender').val().trim();
        var phone = $('#phone').val().trim();
        var verification_code = $('#verification_code').val().trim();
        var contact = $('#contact').val().trim();
        var email = $('#email').val().trim();
        var address = $('#address').val().trim();
        var password = $('#password').val().trim();
        var confirm_password = $('#confirm_password').val().trim();
        var password = $('#password').val().trim();
        
      
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'registration_user_form_submit.php',
          data:{ 
              user_id: user_id,
              name: name,
              age: age,
              gender: gender,
              contact: contact,
              phone: phone,
              email: email,
              address: address,
              password: password,
              confirm_password: confirm_password
            },
          //timeout: 4000,
          success: function(result) {
            response = result;
            alert(response);
            //window.location.replace("index.php");
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
          }
        });
        
        //alert(response);
        
      
      }
    

  });

      $("#get_code").click(function(){
        if($('#phone').val().trim() == "")
        {
          alert("Please Insert Phone No");
          $('#phone').focus();
          return false;
        }
        else
        {
          if($('#name').val().trim() == ""){
            alert("Please Insert Your Name");
            $('#name').focus();
            return false;
        }
        var name = $('#name').val().trim();
        message_code = '<?php echo rand();?>';
        message = 'Hi '+name+' ! Your Verification Code: '+message_code;

        to = $('#phone').val().trim();
        token = 'e9911ef90e77f3c87fc1ba12fc78299a';
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          //url: 'http://sms.greenweb.com.bd/api.php',
          url: 'message_test.php',
          data:{

              message: message,
              to: to,
              token: token,
            },
          //timeout: 4000,
          success: function(result) {
            response = result;
            alert(response);
            $('#phone').prop('readonly', true);

          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
          }
        });

      }
      });


            $("#verification_code").keyup(function(){
            verification_code = $('#verification_code').val().trim();
            if($('#phone').val().trim() == "")
                {
                  alert("Please Insert Phone and Get Verifucation Code");
                  $('#phone').focus();
                  return false;
                }


                else if($('#verification_code').val().trim() == "")
                {
                  alert("Please Insert Verification Code");
                  $('#verification_code').focus();
                  return false;
                } 
                else if(message_code != verification_code){
                   $( "#status_icon" ).removeClass( "glyphicon glyphicon-ok" );
                   $("#status_icon").addClass("glyphicon glyphicon-remove");
                    $("#sign_up_button_user").attr("disabled", true);
                 // alert("Verification Code Not Matched. Click Get Code Button and Try Again");
                  return false;
                }
                else if(message_code == verification_code){
                  $( "#status_icon" ).removeClass( "glyphicon glyphicon-remove" );
                   $("#status_icon").addClass("glyphicon glyphicon-ok");
                   $("#sign_up_button_user").removeAttr("disabled");
                  //alert("Verification Code Matched");
                  return true;
                }


                 return true;
      }); 

  

      });  
  
  function form_validation()
  {
    //alert("validation");
    var verification_code = $('#verification_code').val().trim();
    if($('#phone').val().trim() == "")
    {
      alert("Please Insert Phone and Get Verifucation Code");
      $('#phone').focus();
      return false;
    }


    else if($('#verification_code').val().trim() == "")
    {
      alert("Please Insert Verification Code");
      $('#verification_code').focus();
      return false;
    } 
    else if(message_code != verification_code){
      
      alert("Verification Code Not Matched. Click Get Code Button and Try Again");
      return false;
    }
    
    if($('#name').val().trim() == "")
    {
      alert("Please Insert Name");
      $('#name').focus();
      return false;
    }   

    else if($('#age').val().trim() == "")
    {
      alert("Please Insert Your Age");
      $('#age').focus();
      return false;
    }       
    else if($('#gender').val().trim() == "")
    {
      alert("Please Insert Speciality");
      $('#gender').focus();
      return false;
    }        
    else if($('#contact').val().trim() == "")
    {
      alert("Please Insert Contact No");
      $('#contact').focus();
      return false;
    } 
  
    else if($('#email').val().trim() == "")
    {
      alert("Please Insert Email address");
      $('#email').focus();
      return false;
    }
         
    else if($('#password').val().trim() == "")
    {
      alert("Please Insert Password");
      $('#password').focus();
      return false;
    }      

    else if($('#confirm_password').val().trim() == "")
    {
      alert("Please Insert Confirm Password Field");
      $('#confirm_password').focus();
      return false;
    }    

    else if($('#password').val().trim() != $('#confirm_password').val().trim())
    {
      alert("Password and  Confirm Password not matched");
      $('#confirm_password').focus();
      return false;
    }


    return true;
  }


</script>


