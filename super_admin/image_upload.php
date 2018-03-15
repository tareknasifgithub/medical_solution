 
<?php include('admin_header.php')?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-body">
        <form class="form-group" action="submit_image_upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    
          <input class="form-control "  type="file" name="fileToUpload" id="fileToUpload">
            <input class="form-control "  type="submit" value="Upload Image" name="submit">
            </form>
          </div>
        </div>
        <button type = "btn pull-right" onclick="submit()" class="btn btn-primary center-block">Submit </button>
        </div></div>
        <?php include('admin_footer.php')?>


