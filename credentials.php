 <?php include('admin_header.php')?>
       
      <div class="row">       
        
        <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">
        <div class="col-md-6">
              <div class="form-group">
                <label>Select Region:</label>
                <select class="form-control " data-placeholder="Select Days"
                        style="width: 100%;">
                  <option value = "1">Dhaka</option>
                  <option>Chittagong</option>
                  <option>Rajshahi</option>
                  <option>Barisal</option>
                  <option>Sylhet</option>
                  <option>Khulna</option>
                  <option>Rangpur</option>
                   <option>Mymensingh</option>
                </select>
              </div>

              <div class="form-group">
                  <label>Location Details :</label>
                  <textarea class="form-control" rows="5" placeholder="Enter Location Details..."></textarea>
               </div>


            </div>
             <div class="col-md-6">

             <div class="form-group">
                <label>Select Area:</label>
                <select class="form-control " data-placeholder="Select Days"
                        style="width: 100%;">
                  <option value = "1">Dhaka</option>
                  <option>Chittagong</option>
                  <option>Rajshahi</option>
                  <option>Barisal</option>
                  <option>Sylhet</option>
                  <option>Khulna</option>
                  <option>Rangpur</option>
                   <option>Mymensingh</option>
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

     
        
        <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">
        	<div class="col-md-6">
               <div class="form-group">
                  <label>New Patient Fee :</label>
                  <input type="text" class="form-control" placeholder="Enter New Patient Fee...">
                </div>

               
            </div>
             <div class="col-md-6">

            <div class="form-group">
                <label>Returnng Patient Fee:</label>
                <input type="text" class="form-control" placeholder="Enter Returning Patient Fee...">
              </div>
              
        </div>
        </div>
        </div>
</div>

<button type = "submit" class="btn btn-primary">Submit </button>

 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFzNslISTAFv4nZSYzxV5gPWlBznxiqRs&callback=initMap">
    </script>
    <script type="text/javascript">
    var markers = [];
        window.onload = function () {

            var mapOptions = {
                center: new google.maps.LatLng(23.7566743,90.3828812),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

            google.maps.event.addListener(map, 'click', function (e) {

              deleteMarkers();
                alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());

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


    </script>
 <?php include('admin_footer.php')?>
