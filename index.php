<?php
include('db_connect.php');
include('header.php');
    $disable_diag_user_appointment_query = "update user_diag_schedule_table SET status = 0 where DATE_FORMAT(now(), '%Y-%m-%d') > DATE_ADD(`date`, INTERVAL 7 DAY) AND visiting_status = 0 AND status = 1 ";
    if ($conn->query($disable_diag_user_appointment_query) === TRUE) {
        
      }
?>
<!-- //header -->
    <!--banner-->
    <!--Slider-->

      <div class="w3l_banner_info">
        <div class="col-md-5 banner-form-agileinfo">
          <img src="images/alt1.png" alt="" />
        </div>
        <div class="col-md-7 slider">
          <div class="callbacks_container">
                <ul class="rslides" id="slider3">
                  <li>
                    <div class="slider_banner_info">
                       <h4>WE make healthy</h4>
                      <p>Medical school education and post graduate education empha -size thoroughness.The good physician treats the disease, great physician treats the patient who has the disease.</p>
                    </div>

                  </li>
                  <li>
                    <div class="slider_banner_info">
                      <h4>Medicine is a science</h4>
                      <p>The best doctor is the one you run to and can't find.We should be concerned not only about the health of individual patients, but also the health of our entire society.</p>
                    </div>

                  </li>
                  <li>
                    <div class="slider_banner_info">
                      <h4>Nothing cures health</h4>
                      <p>Never go to a doctor whose office plants have died.You know what they call the fellow who finishes last in his medical school graduating class? They call him 'Doctor. </p>
                    </div>

                  </li>
                  <li>
                    <div class="slider_banner_info">
                      <h4>We do best treatment</h4>
                      <p>Time is generally the best doctor.so well choose your best doctor before time lossesThe art of medicine consists in amusing the patient while nature cures the disease.</p>
                    </div>

                  </li>
                </ul>
          </div>
        </div>
        <div class="clearfix"></div>
      <!--//Slider-->
      
      </div>
    <!--//banner-->
    
  </div>  

  <div class="section-heading text-center" style="background-color: #4ACCD1; min-height: 80px; border-radius: 30px; width: 85%; margin-top: 20px; margin-left: 7.5%; padding-top: 1.8%">
                <h2 class="h-bold">Departments</h2>
                <div class="divider-short"></div>
              </div>
     <section id="boxes" class="home-section paddingtop-40 " style="margin: 20px;background: #EFEFEF">

      <div class="container" >
        <div class="row">

              <?php 
                $sql = "select * from doctor_specialist_area";
                $result = mysqli_query($conn,$sql);
                if($result->num_rows > 0){
                  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>
                  <a onclick="pass_specialist_area_information(<?php echo $row['id'];?>,'<?php echo $row['specialist_area'];?>')">

                           <div class="col-sm-2 col-md-2" >
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">

                <span class="<?php echo $row['icon_name']; ?>"></span>
               
                <p><h4 class="h-bold"></h4>
                 <?php echo $row['specialist_area'];?>
                
                </p>
              </div>
            </div>
          </div>
        </a>
                <?php 
                }
                   }
                ?>

        </div>
      </div>

    </section>

     <div class="count_div container-fluid hidden-xs" style="margin-bottom: 15px;">
    <div class="row">
      <div class="col-lg-1 col-sm-1"></div>
      <div class="col-lg-10 col-sm-10">
        <div class="row count_row">
          <div class="col-lg-4 col-sm-4 text-center">
            <span class="count_number count_color count">200</span>            
            <p class="count_text count_color">Appointments Served</p>
            <p class="count_icon count_color">
              <img style="height: 60px; width: 60px;" src="images/final.svg#svgView(viewBox(198,565,68,68))">
            </p>
          </div>
          <div class="col-lg-4 col-sm-4 text-center">
            <p class="count_number count_color counter count">8186</p>
            <p class="count_text count_color">Verified Doctors</p>
            <p class="count_icon count_color">
              <img style="height: 60px; width: 60px;" src="images/final.svg#svgView(viewBox(266,565,68,68))"></p>
            </div>

            <div class="col-lg-4 col-sm-4 text-center">
              <p class="count_number count_color counter count">62</p>
              <p class="count_text count_color">Districts Covered</p>
              <p class="count_icon count_color">
                <img style="height: 60px; width: 60px;" src="images/final.svg#svgView(viewBox(334,565,68,68))">
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-1 col-sm-1">
          
        </div>
      </div>
    </div>
<div class="section-heading text-center" style="background-color: #4ACCD1; min-height: 80px; border-radius: 30px; width: 85%; margin-left: 7.5%; padding-top: 1.8%">
                <h2 class="h-bold">Services</h2>
                <div class="divider-short"></div>
              </div>
        <section id="boxes" class="home-section paddingtop-80" style="margin: 20px;background: #EFEFEF">
          

      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">

                <i class="fa fa-check fa-3x circled bg-skin"></i>
                <h4 class="h-bold">Make an appoinment</h4>
                
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">

                <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                <h4 class="h-bold">Choose your package</h4>
                
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">
                <i class="fa fa-user-md fa-3x circled bg-skin"></i>
                <h4 class="h-bold">Help by specialist</h4>
                
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">

                <i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
                <h4 class="h-bold">Get diagnostic report</h4>
                
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    <!-- classes -->  <!-- blog -->

  <div id="blog" class="banner-bottom blog">
    <div class="container">
      <div class="w3ls-heading">
        <h3>Laboratories</h3>
      </div>      
      <div class="w3layouts_classes_grids">

        <ul id="flexiselDemo1"> 
          <?php 
          $diagnostic_info = "SELECT
diagnostic_info.id,
diagnostic_info.`name`,
diagnostic_info.phone,
diagnostic_info.contact,
diagnostic_info.email,
diagnostic_info.address,
tbl_area.area_name,
tbl_region.region_name
FROM
diagnostic_info
LEFT JOIN diagnostic_credentials ON  diagnostic_info.id = diagnostic_credentials.diagnostic_id
LEFT JOIN tbl_area ON diagnostic_credentials.area = tbl_area.id
LEFT JOIN tbl_region ON diagnostic_credentials.region = tbl_region.id";
                $result = mysqli_query($conn,$diagnostic_info);
                if($result){ 
                  if($result->num_rows > 0){
                  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>

          <li>
            <div class="w3_agile_class_grid">
              <div class="w3layouts_team_grid agileits_w3layouts_class">
                <img src="images/1.jpg" alt=" " class="img-responsive" />
                <div class="w3layouts_team_grid_pos">
                  <div class="wthree_text">
                    <a class="agile_class" href="#" data-toggle="modal" data-target="#myModal">Learn More</a>
                  </div>
                </div>                
              </div>
              <div class="w3_agileits_class_grid">
              <h4><a onclick="pass_diagnostic_id(<?php echo $row['id'];?>)"><?php echo $row['name'];?></a></h4> 
               <h5><?php echo $row['address'];?></h5> 
                <p><?php echo $row['area_name'];?>, <?php echo $row['region_name'];?></p>               
              </div>
            </div>
          </li> 

          <?php }}}?>  

          
        </ul>
      </div>
    </div>
  </div>
<a href="all_laboratory.php"><div class="section-heading text-center" style="background-color: #4ACCD1; min-height: 80px; border-radius: 30px; width: 85%; margin-left: 7.5%; padding-top: 1.8%; margin-top: 2%;
margin-bottom: 2%">
                <h2 class="h-bold">View All Laboratories</h2>
                <div class="divider-short"></div>
              </div></a>
 

    <script type="text/javascript">$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});</script>
    <style type="text/css">
#shiva
{
  width: 100px;
  height: 100px;
  background: red;
  -moz-border-radius: 50px;
  -webkit-border-radius: 50px;
  border-radius: 50px;
  float:left;
  margin:5px;
}
.count
{
  line-height: 100px;
  color:white;
  margin-left:30px;
  font-size:70px;
}

    .home-section {
    padding-top: 0px;
  display:block;
    position:relative;
    z-index:120;
  background-color: #fff;
}
h2,h4,p{
  font-family: 'Tahoma', sans-serif;
    font-weight: 450;
  
}
.shadow{
  -webkit-box-shadow: 0px 0px 126px 4px rgba(0,0,0,0.96);
-moz-box-shadow: 0px 0px 126px 4px rgba(0,0,0,0.96);
box-shadow: 0px 0px 126px 4px rgba(0,0,0,0.96);
}
.cardiologist_icon{

  background-image: url("./images/icons.png");

    background-position: -16px -272px;

    background-repeat: no-repeat;

    display: inline-block;

    height: 60px;

    width: 60px;

}



.medicine_icon{

  background-image: url("./images/icons.png");

    background-position: -540px -272px;

    background-repeat: no-repeat;

    display: inline-block;

    height: 60px;

    width: 60px;

}



.orthopedics_icon{

  background-image: url("./images/icons.png");

    background-position: -435px -272px;

    background-repeat: no-repeat;

    display: inline-block;

    height: 60px;

    width: 60px;

}



.dental_icon{

  background-image: url("./images/icons.png");

    background-position: -227px -272px;

    background-repeat: no-repeat;

    display: inline-block;

    height: 60px;

    width: 60px;

}



.dermatology_icon{background-image: url("./images/icons.png");background-position: -127px -272px;background-repeat: no-repeat;display: inline-block;height: 60px;width: 60px;}



.gastroenterology_icon{

  background-image: url("./images/icons.png");

    background-position: -325px -272px;

    background-repeat: no-repeat;

    display: inline-block;

    height: 60px;

    width: 60px;

}

.box {
    padding: 45px;
  }
  .bg-skin {
  background: #4ACCD1;
}
.circled {
  border-radius: 50%;
  display: inline-block;
  color: #fff;
  width: 1.6em;
    height: 1.6em;
  text-align: center;
  line-height: 1.6em;
}
.box p {
    margin: 0 0 30px;
    font-family: 'Tahoma', sans-serif;
    font-weight: 900;
  color: #3BB9FF;
  line-height: 2em;
}

  .box i {
    margin-bottom: 30px;
  }



</style>

<script>
  //Send specialist_area_id to speciality wise dr list  page
function pass_specialist_area_information(specialist_area_id,specialist_area) {
 $('<form action="dr_by_dept.php" method="post">' +
  '<input type="hidden" name="specialist_area_id" value="' + specialist_area_id + '">' +
  '<input type="hidden" name="specialist_area" value="' + specialist_area + '">' +
   '</form>').appendTo('body').submit();
}

function pass_diagnostic_id(diagnostic_id) {
 $('<form action="diagnostic_details.php" method="post">' +
  '<input type="hidden" name="diagnostic_id" value="' + diagnostic_id + '">' +
   '</form>').appendTo('body').submit();
}

</script>
  <!-- //banner --> 
<?php 
include('footer.php');
include('script.php');
?>