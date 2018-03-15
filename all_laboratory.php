	<?php 
include('header.php');
?>

	<div class="about" id="about" >
		<div class="container">
			<div class="w3ls-heading" style="color: #FFF">
				<h3>All Laboratories</h3>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="my-list">
			<img src="http://hpservicecenterschennai.in/images/hp_laptop_service_centers_in_guindy.png" alt="dsadas" />
			<h3>Laboratory Name</h3>
			<span style="text-align:center">Location</span>					
			<div class="detail">
			
			<img src="http://hpservicecenterschennai.in/images/hp_laptop_service_centers_in_guindy.png" alt="dsadas" />
			<a href="user/diagnostic_appointment.php" class="btn btn-info">Get Appointment</a>
			<a href="diagnostic_details.php" class="btn btn-info">Details</a>
			</div>
		</div>
		</div>    
        
		</div>
	</div>

<style type="text/css">
	img{max-width:100%;}
	*{transition: all .5s ease;-moz-transition: all .5s ease;-webkit-transition: all .5s ease}
.my-list {
    width: 100%;
    padding: 10px;
    border: 1px solid #f5efef;
    float: left;
    margin: 15px 0;
    border-radius: 5px;
    box-shadow: 2px 3px 0px #e4d8d8;
    position:relative;
    overflow:hidden;
     background: #D8E1DA;
}
.my-list h3{
    text-align: center;
    font-size: 14px;
    font-weight: 700;
    line-height: 21px;
    margin: 0px;
    padding: 0px;
    border-bottom: 1px solid #ccc4c4;
    margin-bottom: 5px;
    padding-bottom: 5px;
    }
	.my-list span{text-align: center;font-weight: bold;}
	.my-list span:last-child{float:center;}
	.my-list .offer{
    width: 100%;
    float: left;
    margin: 5px 0;
    border-top: 1px solid #ccc4c4;
    margin-top: 5px;
    padding-top: 5px;
    color: #afadad;
    }
	.detail {
    position: absolute;
    top: -107%;
    left: 0;
    text-align: center;
    background: #fff;height: 100%;width:100%;
	
}
	
.my-list:hover .detail{top:0;}
</style>

<?php 
include('footer.php');
include('script.php');
?>