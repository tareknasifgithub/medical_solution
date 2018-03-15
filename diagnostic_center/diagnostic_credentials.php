 <?php include('diagnostic_header.php')?>
      <div class="row">       
        
        <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">
        <?php 
                include('../db_connect.php');
                $sql = "select * from tbl_region";
                $result = mysqli_query($conn,$sql);
                ?>
        <div class="col-md-6">
              <div class="form-group">
                <label>Select Region:</label>
                <select class="form-control " id = "region" data-placeholder="Select Region">
                    <option value = 'select'>Select Area</option>
                    <?php 
                    if($result){
                if($result->num_rows > 0){
                  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>

                    <option value = '<?php echo $row['id']; ?>'><?php echo $row['region_name']; ?></option>

                                    <?php 
                }
                   }}
                ?>
                </select>
              </div>
 <div class="form-group">
                  <label>Location Details :</label>
                  <textarea class="form-control"  id = "location_details" rows="5" placeholder="Enter Location Details..."></textarea>
               </div>


            </div>
             <div class="col-md-6">

             <div class="form-group">
                <label>Select Area:</label>
                <select class="form-control "  id = "area" data-placeholder="Select Days"
                        style="width: 100%;">

                </select>
              </div>

                <div class = "form-group">
                <label> Location on map : </label><br>
                
                <div id="dvMap" style="width: 450px; height: 300px">
                </div>
             </div>
              
        </div>
        </div>
        </div>



<button type = "button" onclick="submit()" class="btn btn-primary">Submit </button>

 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFzNslISTAFv4nZSYzxV5gPWlBznxiqRs&callback=initMap">
    </script>
    <script type="text/javascript">
    var markers = [];
        window.onload = function () {

                 $("#region").change(function() {
                  var region_id = $('#region').val().trim();

        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'pick_area.php',
          data:{ 
              region_id: region_id
            },
          //timeout: 4000,
          success: function(result) {
            response = result;
            $('#area').html(response);
            
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
          }
        });


                });

            var mapOptions = {
                center: new google.maps.LatLng(23.7566743,90.3828812),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

            google.maps.event.addListener(map, 'click', function (e) {
               if (confirm('Are you sure you want to Change your Location?')) {

                deleteMarkers();
                //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                longitude = e.latLng.lat();
                latitude =  e.latLng.lng();

                var myCenter = new google.maps.LatLng(e.latLng.lat(),e.latLng.lng());
            //     var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
                
                mapOptions = {
                center: new google.maps.LatLng(e.latLng.lat(),e.latLng.lng()),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            // var infoWindow = new google.maps.InfoWindow();
            // var latlngbounds = new google.maps.LatLngBounds();
            //var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            var marker = new google.maps.Marker({position:myCenter});
                markers.push(marker);
                marker.setMap(map);
              }
            });

            function setMapOnAll(map) {
             
                for (var i = 0; i < markers.length; i++) {
                  markers[i].setMap(map);
                }
              }

      // Removes the markers from the map, but keeps them in the array.
            function clearMarkers() {

              setMapOnAll(null);
            }

      // Shows any markers currently in the array.
            function showMarkers() {
              setMapOnAll(map);
            }

      // Deletes all markers in the array by removing references to them.
            function deleteMarkers() {

                  clearMarkers();
                  markers = [];
                }
              }


        function setMapOnAll(map) {
          var markers = [];
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }


    function submit() {
    if(form_validation())
      {
        var region = $('#region').val().trim();
        var area = $('#area').val().trim();
        var location_details = $('#location_details').val().trim();
      
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'credentials_submit.php',
          data:{ 
              region: region,
              area:area,
              location_details:location_details,
              longitude:longitude,
              latitude:latitude
            },
          //timeout: 4000,
          success: function(result) {
            response = result;
            alert(response);
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
          }
        });
        
        //alert(response);
        
      
      }
}

    function form_validation()
    {
      //alert("validation");
      
      if($('#region').val().trim() == "select")
      {
        alert("Please Select Region");
        $('#region').focus();
        return false;
      }      

      else if($('#area').val().trim() == "select")
      {
        alert("Please Select Area");
        $('#area').focus();
        return false;
      }      

      else if($('#location_details').val().trim() == "")
      {
        alert("Please Insert Location Details");
        $('#location_details').focus();
        return false;
      }      

     
      else if( typeof longitude === "undefined")
      {
        alert("Please Select Map Location");
         return false;
      }   
      return true;
    }

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

    </script>

  <script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../asset/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../asset/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../asset/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../asset/bower_components/moment/min/moment.min.js"></script>
<script src="../asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../asset/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../asset/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../asset/dist/js/demo.js"></script>


