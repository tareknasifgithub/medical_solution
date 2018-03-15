<?php 
include('header.php');
?>
<!-- //team -->	<!-- //Our specialists -->
	<div class="team" id="team">
		<div class="container">
			<div class="w3ls-heading">
				<h3>Meet Our Specialists</h3>
			</div>
			<div class="agile_team_grids">
				<div class="col-md-3 agile_team_grid  agile_team_gridf">
					<div class="agile_team_grid_main">
						<img src="images/t.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
								<li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
								<li><a href="#" class="icon-button google"><i class="icon-google"></i><span></span></a></li>
								<li><a href="#" class="icon-button v"><i class="icon-v"></i><span></span></a></li>
								<li><a href="#" class="icon-button pinterest"><i class="pinterest"></i><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Elisa liden</h4>
						<p>Numerology</p>
					</div>
				</div>
				<div class="col-md-3 agile_team_grid agile_team_grid2">
					<div class="agile_team_grid_main">
						<img src="images/t2.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
								<li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
								<li><a href="#" class="icon-button google"><i class="icon-google"></i><span></span></a></li>
								<li><a href="#" class="icon-button v"><i class="icon-v"></i><span></span></a></li>
								<li><a href="#" class="icon-button pinterest"><i class="pinterest"></i><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Martina</h4>
						<p>Dentist</p>
					</div>
				</div>
				<div class="col-md-3 agile_team_grid agile_team_grid3">
					<div class="agile_team_grid_main">
						<img src="images/tt.png" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
								<li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
								<li><a href="#" class="icon-button google"><i class="icon-google"></i><span></span></a></li>
								<li><a href="#" class="icon-button v"><i class="icon-v"></i><span></span></a></li>
								<li><a href="#" class="icon-button pinterest"><i class="pinterest"></i><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Vickey alter</h4>
						<p>Surgery Specialist</p>
					</div>
				</div>
				<div class="col-md-3 agile_team_grid agile_team_grid4">
					<div class="agile_team_grid_main">
						<img src="images/t4.jpg" alt=" " class="img-responsive" />
						<div class="p-mask">
							<ul class="social-icons">
								<li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
								<li><a href="#" class="icon-button google"><i class="icon-google"></i><span></span></a></li>
								<li><a href="#" class="icon-button v"><i class="icon-v"></i><span></span></a></li>
								<li><a href="#" class="icon-button pinterest"><i class="pinterest"></i><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="agile_team_grid1">
						<h4>Rose mary</h4>
						<p>Skin care expert</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //team -->	<!-- //Our specialists -->

<!-- appointment form -->
<div class="line">
</div>
<div class="appointment" >
	<div class="container">
		<div class="w3ls-heading">
			<h3>Make an appointment today</h3>
		</div>
		<div class="appointment-grid">
			<div class="col-md-4 appointmnet-left">
				<div class="inner">
					<div class="working-grid">
						<h4>working hours</h4>
						<p><i class="fa fa-calendar" aria-hidden="true"></i><span>Mon to fri</span> <span class="span1">9:00 am to 6:30 pm</span></p>
						<p><i class="fa fa-calendar" aria-hidden="true"></i><span>sat</span> <span class="span1">9:00 am to 10:00 pm</span></p>
						<p><i class="fa fa-calendar" aria-hidden="true"></i><span>sun</span> <span class="span1">10:00 am to 1:00 pm</span></p>
					<div class="clearfix"></div>
					</div>
					<div class="working-grid1">
						<h4>For help</h4>
						<h5><i class="fa fa-pencil" aria-hidden="true"></i>For appointment fill the form</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet ultrices odio.</p>
					<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-4 appointmnet-middle">
				<div class="inner">
					<h4>Appointment form</h4>
					<form action="#" name="row" method="post" class="register">
						<input type="text" name="name" id="name" placeholder="Name" required="">
						<input type="email" name="email" id="Email" placeholder="Email id" required="">
						<input type="text" name="mobile number" id="Mobile_Number" placeholder="Mobile Number" required="">
						<input class="date" id="datepicker" type="text" value="Appointment date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Appointment date';}" required="">
						<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Message...';}" >Enter Message...</textarea>
						<input type="submit" onclick="myFunction()" value="book appointment ">
					</form>
				</div>
			</div>
			<div class="col-md-4 appointmnet-right">
				<div class="inner">
					<img src="images/tt.png" alt=""/>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //appointment form -->

<?php 
include('footer.php');
include('script.php');
?>

							<link rel="stylesheet" href="css/jquery-ui.css" />
									<script src="js/jquery-ui.js"></script>
									<script>
										function DisableMonday(date) {
 
											  var day = date.getDay();
											 // If day == 1 then it is MOnday
											 if (day == 0) {
											 
											 return [false] ; 
											 
											 } 
											  if (day == 5) {
											 
											 return [false] ; 
											 
											 } 

											 else { 
											 
											 return [true] ;
											 }
											  
											}
										$(function() {
										$( "#datepicker" ).datepicker({
											 beforeShowDay: DisableMonday,
											  minDate: -20, maxDate: "+1M +10D"
											 });
										});
									</script>