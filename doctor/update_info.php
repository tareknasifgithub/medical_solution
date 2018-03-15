 <?php include('admin_header.php')?>
       
      <div class="row">  
        <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">

     
        
        <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">
          <div class="col-md-6">
               <div class="form-group">
                  <label>New Patient Fee :</label>
                  <input type="text"  id = "new_patient_fee" class="form-control" placeholder="Enter New Patient Fee...">
                </div>

               
            </div>

             <div class="col-md-6">

            <div class="form-group">
                <label>Returning Patient Fee:</label>
                <input type="text"  id = "returning_patient_fee" class="form-control" placeholder="Enter Returning Patient Fee...">
              </div>
              
        </div>            

         <div class="col-md-6">

            <div class="form-group">
                <label>Approximate Duration Per Patient:</label>
                <input type="text"  id = "duration_per_patient" class="form-control" placeholder="Enter Approximate Duration Per Patient...">
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
            alert(response);
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
        var new_patient_fee = $('#new_patient_fee').val().trim();
        var returning_patient_fee = $('#returning_patient_fee').val().trim();
        var duration_per_patient = $('#duration_per_patient').val().trim();
        
      
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'credentials_submit.php',
          data:{ 
              region: region,
              area:area,
              location_details:location_details,
              new_patient_fee:new_patient_fee,
              returning_patient_fee:returning_patient_fee,
              longitude:longitude,
              latitude:latitude,
              duration_per_patient:duration_per_patient
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

      if($('#area').val().trim() == "select")
      {
        alert("Please Select Area");
        $('#area').focus();
        return false;
      }      

      if($('#location_details').val().trim() == "")
      {
        alert("Please Insert Location Details");
        $('#location_details').focus();
        return false;
      }      

      if($('#new_patient_fee').val().trim() == "")
      {
        alert("Please Insert New Patient Fee");
        $('#new_patient_fee').focus();
        return false;
      }      

      if($('#returning_patient_fee').val().trim() == "")
      {
        alert("Please Insert Returning Patient Fee");
        $('#returning_patient_fee').focus();
        return false;
      }      

      if($('#duration_per_patient').val().trim() == "")
      {
        alert("Please Insert Time Duration for Per Patient");
        $('#duration_per_patient').focus();
        return false;
      }
      else if( typeof longitude === "undefined")
      {
        alert("Please Select Map Location");
         return false;
      }      


      return true;
    }





    </script>

    <script>

    </script>
 <?php include('admin_footer.php')?>


