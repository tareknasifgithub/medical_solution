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

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
       
      <div class="row">
        
        <!-- /.col (left) -->
        <div class="col-md-12">
          <div class="box box-primary">          
            <div class="box-body">
              <!-- Date -->
              
              <!-- /.form group -->

              <!-- Date range -->
              <div class="form-group">
                <label>Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
			  </div>
			  <div class="box-body">         		   

        <div class="col-md-6">
              <div class="form-group">
                <label>Select Days:</label>
                <select class="form-control select2" id = "select_day" multiple="multiple" data-placeholder="Select Days"
                        style="width: 100%;">
                  <option value = "0">Saturday</option>
                  <option value = "1">Sunday</option>
                  <option value = "2">Monday</option>
                  <option value = "3">Tuesday</option>
                  <option value = "4">Wednesday</option>
                  <option value = "5">Thursday</option>
                  <option value = "6">Friday</option>
                </select>
              </div>
        </div>

      
        </div>
        <div class="form-group">
    

<section class="content-header">
			  <h3> Slot 1 </h3> </section>
            <div class="col-md-6 bootstrap-timepicker">
                <div class="form-group">
                  <label>Start Time:</label>

                  <div class="input-group">
                    <input type="text" id= 'slot_1_start_time' class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
			  <div class="col-md-6 bootstrap-timepicker">
                <div class="form-group">
                  <label>End Time:</label>

                  <div class="input-group">
                    <input type="text" id= 'slot_1_end_time' class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
			  <section class="content-header">
			    <h3> Slot 2 </h3></section>
            <div class="col-md-6 bootstrap-timepicker">
                <div class="form-group">
                  <label>Start Time:</label>

                  <div class="input-group">
                    <input type="text" id= 'slot_2_start_time' class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
			  <div class="col-md-6 bootstrap-timepicker">
                <div class="form-group">
                  <label>End Time:</label>

                  <div class="input-group">
                    <input type="text" id= 'slot_2_end_time' class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
			  <section class="content-header">
			    <h3> Slot 3 </h3></section>
            <div class="col-md-6 bootstrap-timepicker">
                <div class="form-group">
                  <label>Start Time:</label>

                  <div class="input-group">
                    <input type="text" id= 'slot_3_start_time' class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
			  <div class="col-md-6 bootstrap-timepicker">
                <div class="form-group">
                  <label>End Time:</label>

                  <div class="input-group">
                    <input type="text" id= 'slot_3_end_time' class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
            </div>

           
          </div>
          
          
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      </div>
	  <button style="align:center" id = 'btn_add_schedule' type = "button" class="btn btn-primary">Submit </button>
      <!-- /.row -->

    </section>
	<?php include('admin_footer.php')?>
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
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'YYYY/MM/DD' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('yyyy/mm/dd', { 'placeholder': 'YYYY/MM/DD' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker({ format: 'yyyy/mm/dd' })
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD h:mm A' })
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
        $('#daterange-btn span').html(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'))
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

    
<script type="text/javascript">


  $(document).ready(function() {
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
              slot_3_end_time: slot_3_end_time
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
