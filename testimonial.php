<!-- //testimonials -->
<?php 
include('header.php');
?>
	<div class="testimonials" id="testimonials">
		<div class="container">
			<div class="w3ls-heading">
				<h3>Testimonials</h3>
			</div>
			<div class="w3_agileits_testimonial_grids">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="w3_agileits_testimonial_grid">
									<p><i class="fa fa-quote-right" aria-hidden="true"></i>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
										dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<i class="fa fa-quote-right" aria-hidden="true"></i></p>
									<img src="images/test1.jpg" alt=" " class="img-responsive" />
									<h4>Rosy James<span>mollit anim</span></h4>
								</div>
							</li>
							<li>
								<div class="w3_agileits_testimonial_grid">
									<p><i class="fa fa-quote-right" aria-hidden="true"></i>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
										dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<i class="fa fa-quote-right" aria-hidden="true"></i></p>
									<img src="images/test2.jpg" alt=" " class="img-responsive" />
									<h4>Allen parker<span>voluptate velit</span></h4>
								</div>
							</li>
							<li>
								<div class="w3_agileits_testimonial_grid">
									<p><i class="fa fa-quote-right" aria-hidden="true"></i>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
										dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<i class="fa fa-quote-right" aria-hidden="true"></i></p>
									<img src="images/test3.jpg" alt=" " class="img-responsive" />
									<h4>Crisp Ally <span>sint occaecat</span></h4>
								</div>
							</li>
						</ul>
					</div>
				</section>
				<!-- flexSlider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<script type="text/javascript">
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				  </script>
				<!-- //flexSlider -->
			</div>
		</div>
	</div>
<!-- //testimonials -->
<?php 
include('footer.php');
include('script.php');
?>