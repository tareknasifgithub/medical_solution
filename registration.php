
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
<legend><center><h2><b>Registration Form</b></h2></center></legend><br>

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
  <label class="col-md-4 control-label" >Designation</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="designation" id = "designation" placeholder="Designation" class="form-control"  type="text">
    </div>
  </div>
</div>

  <div class="form-group"> 
  <label class="col-md-4 control-label">Speciality</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="speciality" id = "speciality" class="form-control selectpicker">
      <option value="">Select your Speciality</option>      
      <option value="1">Cerdiology</option>    
      <option value="2">Dental</option>    
      <option value="3">Dermalogy</option>    
      <option value="4">Gastroenterology</option>    
      <option value="5">Medicine</option> 
      <option value="6">Orthopaedics</option> 
    </select>
  </div>
</div>
</div>

<div class="form-group"> 
  <label class="col-md-4 control-label">Gender</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="gender" id = "gender" class="form-control selectpicker">
      <option value="">Select your Gender</option>  
       <option value="male">Male</option> 
       <option value="female">Female</option>                
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
  <span class="input-group-addon">
    <i class="glyphicon glyphicon-user"></i></span>
  <input  name="verification_code" id = "verification_code" placeholder="Verification Code" class="form-control"  type="text"> 

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
  <label class="col-md-4 control-label">Contact No.</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" id = "contact" placeholder="(880)" class="form-control" type="text">
    </div>
  </div>
</div>  

<div class="form-group">
  <label class="col-md-4 control-label">BMDC Registration Number</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="bmdc_reg_no" id = "bmdc_reg_no" placeholder="BMDC Registration Number" class="form-control"  type="text">
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

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Confirm Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="confirm_password" id = "confirm_password" placeholder="Confirm Password" class="form-control"  type="password">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Description (professional statement)</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <textarea name="description" id = "description" placeholder="Description (professional statement)" class="form-control"  type="text"></textarea>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Degree & Other Specification</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <textarea name="degree_and_other_specification" id = "degree_and_other_specification" placeholder="Degree & Other Specification" class="form-control"  type="text"></textarea>
    </div>
  </div>
</div>

<!-- Text input-->
     


<!-- Text input-->
       


<!-- Select Basic -->

<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button type="button" id = "sign_up_button" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
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
    $("#sign_up_button").click(function(){
      
      if(form_validation())
      {
        var name = $('#name').val().trim();
        var designation = $('#designation').val().trim();
        var speciality = $('#speciality').text().trim();
        var specialist_area_id = $('#speciality').val().trim();
        var gender = $('#gender').val().trim();
        var contact = $('#contact').val().trim();
        var verification_code = $('#verification_code').val().trim();
        var email = $('#email').val().trim();
        var phone = $('#phone').val().trim();
        var bmdc_reg_no = $('#bmdc_reg_no').val().trim();
        var password = $('#password').val().trim();
        var confirm_password = $('#confirm_password').val().trim();
        var password = $('#password').val().trim();
        var description = $('#description').val().trim();
        var degree_and_other_specification = $('#degree_and_other_specification').val().trim();
        
      
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'registration_dr_form_submit.php',
          data:{ 
              name: name,
              designation: designation,
              speciality: speciality,
              specialist_area_id: specialist_area_id,
              gender: gender,
              contact: contact,
              verification_code: verification_code,
              email: email,
              phone: phone,
              bmdc_reg_no: bmdc_reg_no,
              password: password,
              confirm_password: confirm_password,
              description: description,
              degree_and_other_specification: degree_and_other_specification
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
                    $("#sign_up_button").attr("disabled", true);
                  return false;
                }
                else if(message_code == verification_code){
                  $( "#status_icon" ).removeClass( "glyphicon glyphicon-remove" );
                   $("#status_icon").addClass("glyphicon glyphicon-ok");
                   $("#sign_up_button").removeAttr("disabled");
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

    else if($('#designation').val().trim() == "")
    {
      alert("Please Insert Designation");
      $('#designation').focus();
      return false;
    }     
    else if($('#speciality').val().trim() == "")
    {
      alert("Please Insert Speciality");
      $('#speciality').focus();
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
    else if($('#verification_code').val().trim() == "")
    {
      alert("Please Insert Verification Code");
      $('#verification_code').focus();
      return false;
    }    
  

    else if($('#email').val().trim() == "")
    {
      alert("Please Insert Phone No");
      $('#phone').focus();
      return false;
    }  
     else if($('#bmdc_reg_no').val().trim() == "")
    {
      alert("Please Insert BMDC Registration Number");
      $('#bmdc_reg_no').focus();
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

    return true;
  }


</script>


