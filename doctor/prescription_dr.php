 <?php include('admin_header.php')?>
<link rel="stylesheet" href="../asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <link rel="stylesheet" href="../asset/multiselect/multiselect.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../asset/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../asset/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../asset/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <style>
* {
  .border-radius(0) !important;
}

#field {
    margin-bottom:20px;
}
</style>

 <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Create Prescription</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Doctor Name</label>
               <input type = "text" class="form-control">
              </div>
            </div>            
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Patient Name</label>
               <input type = "text" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Age</label>
              <input type = "text" class="form-control">
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label>Date</label>
              <input type = "text" class="form-control">
              </div>
            </div>  

          </div>
        </div>
       
      </div>

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
       
      <div class="row">
        
        <!-- /.col (left) -->
        <div class="col-md-12">
          <div class="box box-primary"> 
        <div class="box-body">               

        <div class="col-md-4">
              <div class="form-group">
                <label>Select Days:</label>
                <select class="form-control select2" id = "select_day" multiple="multiple" data-placeholder="Select Days"
                        style="width: 100%;">
                  <option value = "1">Saturday</option>
                  <option value = "2">Sunday</option>
                  <option value = "3">Monday</option>
                  <option value = "4">Tuesday</option>
                  <option value = "5">Wednesday</option>
                  <option value = "6">Thursday</option>
                  <option value = "7">Friday</option>
                </select>
              </div>
        </div>

      
        </div>


                  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Add Test</h3>
            </div>
            <div class="box-body">
              <!-- Color Picker -->
              <input type="hidden" name="count" value="1" />
        <div class="control-group" id="fields">
            <label class="control-label" for="field1">Nice Multiple Form Fields</label>
            <div class="controls" id="profs"> 
                <form class="input-append">
                    <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="4"/><button id="b1" class="btn add-more" type="button">+</button></div>
                </form>
            <br>
            <small>Press + to add another test</small>
            </div>
        </div>

             
            </div>
          </div>


        </div>
        <!-- /.col (left) -->
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Medicine Name</h3>
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <div class="box-body pad">
                  <form>
                        <textarea id="editor1" name="editor1" rows="10" cols="80">
                                               
                        </textarea>
                  </form>
                </div>
              </div>
              
            </div>
          </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->

    
    <button style="align:center" id = 'btn_add_schedule' type = "button" class="btn btn-primary">Submit </button>
      <!-- /.row -->

    </section>
  <?php include('admin_footer.php')?>

<!-- FastClick -->
<script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../asset/dist/js/demo.js"></script>
    <!-- CK Editor -->
<script src="../asset/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


  <script src="../asset/dist/js/adminlte.min.js"></script>
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

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

    
<script type="text/javascript">


  $(document).ready(function() {


        var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
    

    $("#btn_add_schedule").click(function(){

              var reservation = $('#reservation').val().trim();
              var select_day=[];
               $('#select_day :selected').each(function(){
                   select_day[$(this).val()]=$(this).val();
                   //select_day[$(this).val()]=$(this).text();
                  });
             // var select_day = $('#select_day').selectedValuesString();
              
        
      var slot_1_start_time = $('#slot_1_start_time').val().trim();
      var slot_1_end_time = $('#slot_1_end_time').val().trim();
      var slot_2_start_time = $('#slot_2_start_time').val().trim();
      var slot_2_end_time = $('#slot_2_end_time').val().trim();
      var slot_3_start_time = $('#slot_3_start_time').val().trim();
      var slot_3_end_time = $('#slot_3_end_time').val().trim();
      if(form_validation())
      {
        //alert(select_day);
        var response;
        $.ajax({
          async: false,
          type: 'POST',
          url: 'schedule_submit.php',
          data:{ 
              reservation: reservation,
              select_day: select_day,
              slot_1_start_time: slot_1_start_time,
              slot_1_end_time: slot_1_end_time,
              slot_2_start_time: slot_2_start_time,
              slot_2_end_time: slot_2_end_time,
              slot_3_start_time: slot_3_start_time,
              slot_3_end_time: slot_3_end_time,
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
    

  });
  

      });  
  
  function form_validation()
  {
   //alert("validation");
    
    if($('#reservation').val().trim() == "")
    {
      alert("Please Select Date Range");
      $('#reservation').focus();
      return false;
    }   

     else if( typeof select_day === "undefined")
    {
      alert("Please Select Days");
      $('#select_day').focus();
      return false;
    }

    else if($('#slot_1_start_time').val().trim() == "")
    {
      alert("Please Select Slot one Start Time");
      $('#slot_1_start_time').focus();
      return false;
    }       
    else if($('#slot_1_end_time').val().trim() == "")
    {
      alert("Please Select Slot one End Time");
      $('#slot_1_end_time').focus();
      return false;
    }   


    return true;
  }


</script>
