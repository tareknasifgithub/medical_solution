	<?php 
include('header.php');
?>
<script src="./login/js/slick.js"></script>

 <?php 
              $doctor_id = $_POST['doctor_id'];
                $sql = "SELECT
doctor_info.`name` AS doctor_name,
doctor_info.specialist_area_id AS specialist_area_id,
doctor_specialist_area.specialist_area AS specialist_area_name,
doctor_info.gender AS doctor_gender,
doctor_info.contact AS doctor_contact,
doctor_info.phone AS doctor_phone,
doctor_info.bmdc_reg_no,
doctor_info.description,
doctor_info.degree_and_other_specification,
doctor_info.email,
doctor_info.reg_date,
doctor_info.image_location,
doctor_info.`status` AS doctor_status,
doctor_specialist_area.`status` AS specialist_area_status,
doctor_credentials.location_details,
doctor_credentials.new_patient_fee,
doctor_credentials.returning_patient_fee,
doctor_credentials.duration_per_patient,
doctor_credentials.longitude,
doctor_credentials.latitude
FROM
doctor_info
LEFT JOIN doctor_specialist_area ON doctor_info.specialist_area_id = doctor_specialist_area.id
LEFT JOIN doctor_credentials ON doctor_info.id = doctor_credentials.doctor_id where doctor_info.id = $doctor_id";
//echo $sql;exit();
                $result = mysqli_query($conn,$sql);
                if($result->num_rows > 0){

                	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                	$specialist_area_id = $row['specialist_area_id'];

                }?>

	
			<!--<div class="col-md-12 about-right" style="background-color:#EFEFEF; font-size: 14px; border-bottom: 2px solid #D0D0D0;">-->
			<div id="doctor_profile_div">
			<div class="container-fluid profile_big_banner text-center">
			<img src="https://doctorola.com/doc_cpanel/assets/image/MAJOR-GEN-GOLAM-MOHIUDDIN.jpg" class="img-circle profile_page_doctor_image" 
			alt="profile pic">
			<p class="profile_page_doctor_name"><?php echo $row['doctor_name']?></p>
			<p class="profile_page_doctor_designation"><?php echo $row['degree_and_other_specification']?></p>
			<p class="profile_page_doctor_sp"><?php echo $row['description']?></p></div>
			
			<div class="container-fluid profile_page_body"><div class="container">
			<div class="row">
			<div class="col-lg-6 col-sm-6" >
			<div class="profile_page_info_block text-center" style = "background-color: #EFEFEF;">
			<p class="block_heading custom_para"><i class="fa fa-stethoscope" aria-hidden="true"></i> Specialist in</p>
			<p class="block_heading custom_para"><i class="fa fa-heart fa-2x" aria-hidden="true"></i></p>
			<p class="custom_para"><?php echo $row['degree_and_other_specification']?></p>
			<hr class="custom_para custom_hr_profile">
			<p class="profile_degree_portion"><?php echo $row['degree_and_other_specification']?></p>
			<hr class="custom_para custom_hr_profile">
			<p class="profile_description_portion"><?php echo $row['description']?>.</p>
			</div>
			
			<div class="profile_page_info_block profile_page_info_block_2" style = "background-color: #EFEFEF;">
				<p class="block_heading text-center block_heading_empty"><i class="fa fa-map-marker" aria-hidden="true"></i> Chambers</p>
				<h4 class="panel-title accordion-toggle" style="font-size: 18px; margin-top: 5px; text-align: center;"> 
				<span style="border-bottom: 1px solid #eee;"><?php echo $row['location_details']?> </span> </h4> 
				<p class="doc_office padding_no" style="font-size:13px;text-align: center; font-weight: 600; margin-top: 10px;">
				<?php echo $row['location_details']?></p>
				<p class="doc_office padding_no" style="font-size:13px; text-align: center; padding-top: 1px !important; font-weight: 600;"></p>
				<hr>
			</div>
			
			
			</div>
			
			
			<div class="col-lg-6 col-sm-6">
			<div class="profile_page_info_block text-center" id="book_an_appoinment_div" style = "background-color: #EFEFEF;">
			<div class="appointment_heading">
			<p class="block_heading block_heading_empty" style="color: #4ABDEC !important; margin-bottom: 5px !important;">
			<i class="fa fa-calendar-o" aria-hidden="true"></i> Book Appointment</p>
			</div>
			<div id="locations_slots_div" style="opacity: 1;">
			<div class="appointment_content">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default" style="border-radius: 0px !important;" id="10677" data-loc_id="10677" data-doc_id="10677">
			<div class="panel-heading" role="tab" id="heading1">
			<h4 class="panel-title accordion-toggle" style="font-size: 18px;">
			<span><?php echo $row['location_details']?> </span>
			<i class="fa fa-map-marker pull-right hidden-xs" style="font-size: 25px; margin-top: -3px;" ;=""></i></h4></div>
			<div role="tabpanel">
			<div class="panel-body" style="padding: 10px !important;">
			<p class="doc_office col-sm-12 col-lg-12 col-xs-12 padding_no" style="font-size:13px;text-align: center; font-weight: 600;">
			<span><?php echo $row['location_details']?></p>
			<p class="doc_office col-sm-12 col-lg-12 col-xs-12 padding_no" style="font-size:13px; text-align: center; padding-top: 1px !important; font-weight: 600;"></p>
			
	
			<div class="col-lg-12 col-sm-12 padding_no" id="slot_content_10677" style="background: #F7F7FC;text-align: right;">
			<div class="col-lg-12 col-sm-12 text-center" style="margin-top: 5px;">
			<p class="text-center bg-danger doc_app_error" style="padding: 15px !important;">
				<a style="margin-top: 5px;" onclick="pass_doctor_id(<?php echo $doctor_id;?>,<?php echo $row['duration_per_patient']?>)"><button type="button" class="btn btn-success">Take Appointment</button>
				</a>
			</p>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>

			<div class="profile_page_info_block profile_page_info_block_2" style = "background-color: #EFEFEF;">
			<p class="block_heading text-center block_heading_empty"><i class="fa fa-map-marker" aria-hidden="true"></i> Chamber(s) Location(Map)</p>
			<div id="map_canvas" style="height: 310px; position: relative; overflow: hidden;">

			
			</div>
			</div>
			
			</div>
			</div>
			</div>
			</div>
			
		
			
		<div class="clearfix"></div>
	
<script async defer
		    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFzNslISTAFv4nZSYzxV5gPWlBznxiqRs&callback=initMap">
		    </script>
		    <script type="text/javascript">
		    var markers = [];
		        window.onload = function () {

		            var mapOptions = {
		                center: new google.maps.LatLng(<?php echo $row['longitude']?>,<?php echo $row['latitude']?>),
		                zoom: 14,
		                mapTypeId: google.maps.MapTypeId.ROADMAP
		            };

		            var infoWindow = new google.maps.InfoWindow();
		            var latlngbounds = new google.maps.LatLngBounds();
		            var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);


		        };


		        </script>





	<!-- modal --><!-- for pop up -->
<div class="modal about-modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="span2" aria-hidden="true">&times;</span></button>						
				<h4 class="modal-title"> Medical Care </h4>
			</div> 
		<div class="modal-body">
			<div class="agileits-w3layouts-info">
				<img src="images/about.jpg" alt="" />
				<p>Duis venenatis, turpis eu bibendum porttitor, sapien quam ultricies tellus, ac rhoncus risus odio eget nunc. Pellentesque ac fermentum diam. Integer eu facilisis nunc, a iaculis felis. Pellentesque pellentesque tempor enim, in dapibus turpis porttitor quis. Suspendisse ultrices hendrerit massa. Nam id metus id tellus ultrices ullamcorper.  Cras tempor massa luctus, varius lacus sit amet, blandit lorem. Duis auctor in tortor sed tristique. Proin sed finibus sem.</p>
			</div>
		</div>
		</div>
	</div>
</div>

 <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext" rel="stylesheet">
 
 

<!--Item slider text-->
<div class="container">
  <div class="row" id="slider-text">
    <div class="col-md-6" >
      <h2>NEW COLLECTION</h2>
    </div>
  </div>
</div>
 <?php 
              $doctor_id = $_POST['doctor_id'];
                $sql = "SELECT * 
FROM 
doctor_info where specialist_area_id = $specialist_area_id";
echo $sql;
                  ?>

<!-- Item slider-->
<div class="container-fluid">

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="carousel carousel-showmanymoveone slide" id="itemslider">
        <div class="carousel-inner">

<?php
 $result = mysqli_query($conn,$sql);
 if($result->num_rows > 0){
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

  ?>
          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="https://s12.postimg.org/655583bx9/item_1_180x200.png" class="img-responsive center-block"></a>
              <br>
              <h4 class="text-center">Doctor Name</h4>
              <h5 class="text-center">Location</h5>
            </div>
          </div>

          <?php }}?>

         






        </div>

        
      </div>
    </div>
  </div>
</div>
<style type="text/css">
	.item h4,h5{
		color: #FFF;
	}
</style>
<!-- Item slider end-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function(){

$('#itemslider').carousel({ interval: 3000 });

$('.carousel-showmanymoveone .item').each(function(){
var itemToClone = $(this);

for (var i=1;i<6;i++) {
itemToClone = itemToClone.next();

if (!itemToClone.length) {
itemToClone = $(this).siblings(':first');
}

itemToClone.children(':first-child').clone()
.addClass("cloneditem-"+(i))
.appendTo($(this));
}
});
});

</script>
<!-- //modal --><!-- //for pop up -->

<?php 
include('footer.php');
include('script.php');
?>

<script>
  //Send Doctor ID to speciality wise dr list  page
function pass_doctor_id(doctor_id,interval) {
   alert(interval);
 $('<form action="user/doctor_appointment.php" method="post">' +
  '<input type="hidden" name="doctor_id" value="' + doctor_id + '">' +
  '<input type="hidden" name="interval" value="' + interval + '">' +
  '<input type="hidden" name="outside" value="' + 1 + '">' +
   '</form>').appendTo('body').submit();
}

</script>