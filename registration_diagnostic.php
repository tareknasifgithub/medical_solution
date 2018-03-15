
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
<legend><center><h2><b>Diagnostic Registration Form</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label"> Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="name" id = "name" placeholder="Name" class="form-control"  type="text">
    </div>
  </div>
</div>
<!-- Text input-->

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
  <label class="col-md-4 control-label">Verification Code</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="verification_code" id = "verification_code" placeholder="Verification Code" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Contact No.</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="contact" id = "contact" placeholder="(880)" class="form-control" type="text">
    </div>
  </div>
</div>

  <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" id = "email" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Address</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <textarea name="address" id = "address" placeholder="" class="form-control"  type="text"></textarea>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Drag Registration Number</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="drag_reg_no" id = "drag_reg_no" placeholder="BMDC Registration Number" class="form-control"  type="text">
    </div>
  </div>
</div>
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="password" id = "password" placeholder="Password" class="form-control"  type="password">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Confirm Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="password" id = "confirm_password" placeholder="Confirm Password" class="form-control"  type="password">
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
    <button type="button" id = "sign_up_button_diagnostic" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
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
    $("#sign_up_button_diagnostic").click(function(){
      if(form_validation())
      {
        //alert("validation true");
        
        var name = $('#name').val().trim();
        var phone = $('#phone').val().trim();
        var contact = $('#contact').val().trim();
        var email = $('#email').val().trim();
        var address = $('#address').val().trim();
        var drag_reg_no = $('#drag_reg_no').val().trim();
        var password = $('#password').val().trim();
        var confirm_password = $('#confirm_password').val().trim();
        var password = $('#password').val().trim();
        
      
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'registration_diagnostic_form_submit.php',
          data:{ 
              name: name,
              phone: phone,
              contact: contact,
              email: email,
              address: address,
              drag_reg_no: drag_reg_no,
              password: password,
              confirm_password: confirm_password
            },
          //timeout: 4000,
          success: function(result) {
            response = result;
            alert(response);
            window.location.replace("index.php");
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



      $("#verification_code").change(function(){
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
                  
                  alert("Verification Code Not Matched. Click Get Code Button and Try Again");
                  return false;
                }
                else if(message_code == verification_code){
                  
                  alert("Verification Code Matched");
                  return true;
                }


                 return true;
      });

  

      });  
  
  function form_validation()
  {
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
    
    else if($('#name').val().trim() == "")
    {
      alert("Please Insert Name");
      $('#name').focus();
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
    else if($('#drag_reg_no').val().trim() == "")
    {
      alert("Please Insert Drag Reg No");
      $('#drag_reg_no').focus();
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


