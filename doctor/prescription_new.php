 <?php include('admin_header.php');
 include('../db_connect.php');?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  

    <?php if($_POST['user_id'])
 {$user_id =  $_POST['user_id'];
 $schedule_id = $_POST['schedule_id']; }
 else exit;

 $sql = "SELECT
diagnostic_info.id,
diagnostic_info.`name`
FROM `diagnostic_info`";

$result = mysqli_query($conn,$sql);
 $diagnostic_array = array();
                if($result->num_rows > 0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {           
           array_push($diagnostic_array, $row);           
          }} ?>
    <section class="content">

     <form class="form-group" action="submit_image_upload.php" method="post" enctype="multipart/form-data">


        <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Upload Prescription</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
  
              <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<div class="container">
    <div class="row clearfix">
      <div class="col-md-8 table-responsive">
      <table class="table table-bordered table-hover table-sortable" id="tab_logic">
        <thead>
          <tr >
            <th class="text-center">
              Name
            </th>          
            <th class="text-center">
              Notes
            </th>
              
                <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
            </th>
          </tr>
        </thead>
        <tbody>
            <tr id='med_addr0' data-id="0" class="hidden">
            <td data-name="med_name">
                <input type="text" name='med_name0'  placeholder='Name' class="form-control"/>
            </td>
          
            <td data-name="med_desc">
                <input type="text" name='med_desc0'  placeholder='Name' class="form-control"/>
            </td>
            
                        <td data-name="del">
                            <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                        </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <a id="add_row" class="btn btn-default pull-left">Add Medicine</a>
</div>
<style type="text/css">
  .table-sortable tbody tr {
    cursor: move;
}
</style>

              
              </div>              
            </div>
            
            </div>

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

        <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Upload Prescription</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
  
              <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<div class="container">
    <div class="row clearfix">
      <div class="col-md-8 table-responsive">
      <table class="table table-bordered table-hover table-sortable" id="test_tab">
        <thead>
          <tr >
           
            <th class="text-center">
              Name
            </th>          
            <th class="text-center">
              Notes
            </th>
              
                <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
            </th>
          </tr>
        </thead>
        <tbody>
            <tr id='test_addr0' data-id="0" class="hidden">
         
            <td data-name="test_name">
                <input type="text" name='test_name0'  placeholder='Name' class="form-control"/>
            </td>
          
            <td data-name="test_desc">
                <input type="text" name='test_desc0'  placeholder='Name' class="form-control"/>
            </td>
            
                        <td data-name="del">
                            <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove test-remove'></button>
                        </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <a id="add_test" class="btn btn-default pull-left">Add Row</a>
</div>
<style type="text/css">
  .table-sortable tbody tr {
    cursor: move;
}
</style>

              
              </div>              
            </div>
            
            </div>

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <button type = "submit" class="btn btn-primary center-block">Submit </button>
            </form>
       

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->

<!-- Page script -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#add_row").on("click", function() {
        var newid = 0;
        $.each($("#tab_logic tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid,
            "data-id": newid
        });
        
        // loop through each td and create new elements with name of newid
        $.each($("#tab_logic tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            var children = cur_td.children();
            if ($(this).data("name") != undefined) {
                var td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
                var td = $("<td></td>", {
                    'text': $('#tab_logic tr').length
                }).appendTo($(tr));
            }
        });       
        
        // add the new row
        $(tr).appendTo($('#tab_logic'));
        
        $(tr).find("td button.row-remove").on("click", function() {
             $(this).closest("tr").remove();
        });
});




    // Sortable Code
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
    
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        
        return $helper;
    };
  
    $(".table-sortable tbody").sortable({
        helper: fixHelperModified      
    }).disableSelection();

    $(".table-sortable thead").disableSelection();



    $("#add_row").trigger("click");
});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#add_test").on("click", function() {
        var newid = 0;
        $.each($("#test_tab tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid,
            "data-id": newid
        });
        
        // loop through each td and create new elements with name of newid
        $.each($("#test_tab tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            var children = cur_td.children();
            if ($(this).data("name") != undefined) {
                var td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
                var td = $("<td></td>", {
                    'text': $('#test_tab tr').length
                }).appendTo($(tr));
            }
        });       
        
        // add the new row
        $(tr).appendTo($('#test_tab'));
        
        $(tr).find("td button.test-remove").on("click", function() {
             $(this).closest("tr").remove();
        });
});




    // Sortable Code
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
    
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        
        return $helper;
    };
  
    $(".table-sortable tbody").sortable({
        helper: fixHelperModified      
    }).disableSelection();

    $(".table-sortable thead").disableSelection();



    $("#add_row").trigger("click");
});
</script>

