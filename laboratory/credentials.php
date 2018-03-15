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
                
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.296948478801!2d-87.70494908450506!3d41.88647047922158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e32a54d21f20f%3A0x51b98b6ffbdca819!2sW+Fulton+St%2C+Chicago%2C+IL%2C+USA!5e0!3m2!1sen!2sin!4v1489574334335"></iframe>
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
                <input type="text" class="form-control" placeholder="Enter Returnng Patient Fee...">
              </div>
              
        </div>
        </div>
        </div>
</div>

<button type = "submit" class="btn btn-primary">Submit </button>


 <?php include('admin_footer.php')?>
