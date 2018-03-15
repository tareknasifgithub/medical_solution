	<?php 
include('header.php');
?>



	<div class="about" id="about" >
		<div class="container">
			<div class="w3ls-heading">
				 <?php 
              $specialist_area = $_POST['specialist_area'];?>
				<h3><?php echo $specialist_area;?> Doctors</h3>
			</div>
			<div class="col-md-12 about-right" style="background-color:#EFEFEF; font-size: 14px; border-bottom: 2px solid #D0D0D0;">
			
			</div>
			<!--<div class="col-md-3 about-left">
				<div class="w3labout-img boxw3-agile"> 
					<img src="images/about.jpg" alt="" class="img-responsive" />
					<div class="agile-caption">
						<h3>Medical care</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
							sed diam nonummy nibh euismod tincidunt.</p>
					</div> 
				</div>
			</div>-->
			

			

		<div class="col-md-12 about-right" style="background-color:#EFEFEF; font-size: 14px; border-bottom: 2px solid #D0D0D0;">
			<div class="col-lg-12 col-sm-12" id="doctor_search_result">		
				<div class="row" style = "margin:10px;">
					<div class="col-md-12 col-xs-12">
						<div id="available_doctors" class="">
							<input type="hidden" class="data" value="1">
								<div class="row">
									<div class="col-lg-12 col-sm-12 doctor_result_div" style = ".doctor_result_div {
											padding: 20px 0;
											border-top: 2px solid #D0D0D0;
											}">

											              <?php 
              $specialist_area_id = $_POST['specialist_area_id'];
                $sql = "SELECT
doctor_info.id AS doctor_id,
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
doctor_info.`status` AS doctor_status,
doctor_specialist_area.`status` AS specialist_area_status,
doctor_credentials.location_details,
doctor_credentials.new_patient_fee,
doctor_credentials.returning_patient_fee
FROM
doctor_info
Left JOIN doctor_specialist_area ON doctor_info.specialist_area_id = doctor_specialist_area.id
Left JOIN doctor_credentials ON doctor_info.id = doctor_credentials.doctor_id where specialist_area_id = $specialist_area_id";
//echo $sql;exit();
                $result = mysqli_query($conn,$sql);
                if($result->num_rows > 0){
										while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
										
										<div class="row" style = "margin-top:10px;border-bottom: 2px solid #D0D0D0;padding-bottom:10px">
											<div class="col-lg-2 col-sm-2 doctor_search_left_block">
												<!-----doc pic block-------->
												<img class="img-circle search_page_doctor_image pull-right" src="https://doctorola.com/doc_cpanel/assets/image/MAJOR-GEN-GOLAM-MOHIUDDIN.jpg" alt="profile pic">
												</div>
												<div class="col-lg-4 col-sm-4 doctor_search_mid_block" style = "border-left: 2px solid #D0D0D0;
												border-right: 2px solid #D0D0D0;
												padding: 10px 20px;">
													<!-----doc mid block-------->
													<p class="search_page_doctor_name grey_font_color"  style = "font-size: 22px;margin: 4px 3px 3px 3px;color:#617b8b;font-family: 'Roboto', sans-serif;"><?php echo $row['doctor_name']?></p>
													<p class="search_page_doctor_name grey_font_color"  style = "font-size: 12px;margin:0 0 5px 0;color:#617B8B;font-family: 'Roboto', sans-serif;line-height:  1.47;	"><?php echo $row['degree_and_other_specification']?>
													<br><?php echo $row['description']?></p>
												</div>
												<div class="col-lg-6 col-sm-6 doctor_search_right_block">
													<!-----doc right block-------->
													<div class="row right_block_row">
														<div class="col-lg-9 col-sm-9" >
															<p class="grey_font_color small_font" style = "font-size:12px;margin:0 0 5px 0;color:#617B8B;font-family: 'Roboto', sans-serif;line-height:  1.47;	">
																<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; Chamber
															</p>
															<p class="small_font grey_font_color" style = "font-size:12px;margin:0 0 5px 0;color:#617B8B;font-family: 'Roboto', sans-serif;line-height:  1.47;	">
																<?php echo $row['location_details']?>
															</p>
															<p class="small_font grey_font_color" style = "font-size:12px;margin:0 0 5px 0;color:#617B8B;font-family: 'Roboto', sans-serif;line-height:  1.47;	">
																<i class="fa fa-money" aria-hidden="true"></i>&nbsp;&nbsp; Fees
															</p>
															<p class="small_font grey_font_color" style = "font-size:12px;margin:0 0 5px 0;color:#617B8B;font-family: 'Roboto', sans-serif;line-height:  1.47;	">New appointment: <?php echo $row['new_patient_fee']?></p>														<p class="small_font grey_font_color" style = "font-size:12px;margin:0 0 5px 0;color:#617B8B;font-family: 'Roboto', sans-serif;line-height:  1.47;	">Returning appointment: <?php echo $row['returning_patient_fee']?></p>
														</div>
														<div class="col-lg-2 col-sm-2 profile_btn_div" >
															
															<a target="_blank" style="margin-top: 5px;" onclick="pass_doctor_id(<?php echo $row['doctor_id'];?>)" class="btn btn-success btn-sm hidden-xs">
																<i class="fa fa-user-md" aria-hidden="true"></i> View Profile
															</a>
														</div>
													</div>
												</div>
											</div>

												<?php }}?>
											
										
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		
			
		<div class="clearfix"></div>
	</div>
</div>






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
<!-- //modal --><!-- //for pop up -->

<?php 
include('footer.php');
include('script.php');
?>

<script>
  //Send Doctor ID to speciality wise dr list  page
function pass_doctor_id(doctor_id) {
  // alert(doctor_id);
 $('<form action="doctor_details.php" method="post">' +
  '<input type="hidden" name="doctor_id" value="' + doctor_id + '">' +
   '</form>').appendTo('body').submit();
}

</script>