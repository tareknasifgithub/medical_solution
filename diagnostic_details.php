	<?php 
include('header.php');

$diagnostic_id = $_POST['diagnostic_id'];
$sql = "select * from diagnostic_info";
$result = mysqli_query($conn,$sql);
if($result->num_rows > 0){
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
}
?>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<link href="https//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<script type="text/javascript"">
	$(document).ready(function() {
    $('#example').DataTable();
} );</script>
	<div class="about" id="about" style="color: #FFF" >
		<div class="container">
			<div class="w3ls-heading">
				<h3><?php echo $row['name'];?></h3><hr>
			</div>

			<table id="example" class="table table-bordered" style="background-color: #33C4FF;font-family: Tahoma" cellspacing="0" width="100%">
        <thead>
            <tr style="background-color: #338DFF">
                <th>Test Name</th>
                <th>Test Details</th>
                <th>Cost</th>
                <th>Commission</th>
                <th>Approximate Duration</th>
            </tr>
        </thead>
        <tfoot>
            <tr style="background-color: #338DFF">
                <th>Test Name</th>
                <th>Test Details</th>
                <th>Cost</th>
                <th>Commission</th>
                <th>Approximate Duration</th>
            </tr>
        </tfoot>
        <tbody>
        <?php 
        $test_sql = "select * from all_test where diagnostic_id = '$diagnostic_id'";
                        $test_result = mysqli_query($conn,$test_sql);
                if($test_result->num_rows > 0){
                                        while($test_row = mysqli_fetch_array($test_result,MYSQLI_ASSOC)) { ?>
            <tr>
                <td><?php echo $test_row['test_name'];?></td>
                <td><?php echo $test_row['test_details'];?></td>
                <td><?php echo $test_row['cost'];?></td>
                <td><?php echo $test_row['commission'];?></td>
                <td><?php echo $test_row['duration_per_test'];?></td>
            </tr>
            <?php }}?>
        </tbody>
    </table>
			
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