<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OneClick|Vendor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/style.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
</head>
<body>

<div class="row">
<div class="col-sm-5 content">
    <img src="dist/img/logo.png">
    <p><b>OneClick</b><br>India's First Regional Online Shopping</p>
    
<p>
<b>Why OneClick?</b><br>
E-Commerce today is a way of life and an extremely integral part 
of modern day shopping. OneClick presents in front of you, a unique
 online shopping experience with its huge variety of products from numerous
  categories, making it a one stop shop for all daily needs. We are proud to 
  announce that OneClick today is the only e-commerce platform which features
   a huge variety of indigenous products from the God’s Own Country Kerala, and
    we are featuring sellers exclusively from Kerala and there by truly standing
     by our tagline of the only Regional Shopping Portal in India. Join OneClick 
     today and be a part of the beginning of a brand new era in the e-commerce industry.
</p>
</div>
<div class="col-sm-7">
<div class="bg-img">
<div class="stepper">
<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
 
  <form id="regiration_form" novalidate action="/addDetails/{{session('sessid')}}"  method="post" class="reg" enctype="multipart/form-data">
  @csrf
  <fieldset>
    <h2> Company Information</h2>
    <div class="form-group">
    <label for="email">Company Name</label>
    <input type="text" class="form-control" id="email" name="name" placeholder="Enter company  name">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Office Number</label>
    <input type="text" class="form-control" id="password" placeholder="Office Number" name="num">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">State</label>
    <input type="text" class="form-control" id="password"  name="state" value="Kerala">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">District</label>
    <input type="text" class="form-control" id="password" placeholder="District" name="dis">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Location</label>
    <input type="text" class="form-control" id="password" placeholder="Location" name="loc">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Business Type</label>
    <select name="business" id="business" class="form-control">
      <option selected="selected" disabled="disabled" value="default">---------------Select Any One---------------</option>
      @foreach($business as $types)
      <option value="{{$types->type}}">{{$types->type}}</option>
      @endforeach
    </select>
    </div>
    <input type="button" name="password" class="next btn btn-info" value="Next" id="step1" />
  </fieldset>
  <fieldset>
    <h2> Store Infromations</h2>
    <div class="form-group">
    <label for="fName">Store Name</label>
    <input type="text" class="form-control" name="store_name" id="store_name" placeholder="Store Name">
    </div>
    <div class="form-group">
    <label for="lName">Selling Category</label>
    <select name="sel_cat" id="sel_cat" class="form-control">
      <option selected="selected" disabled="disabled" value="default">---------------Select Any One---------------</option>
      @foreach($cat as $main)
      <option value="{{$main->c_id}}">{{$main->category}}</option>
      @endforeach
    </select>
    </div>
    <div class="form-group">
    <label for="lName">Store Logo</label>
    <input type="file" class="form-control" name="store_logo" id="store_logo" placeholder="Store Logo">
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" />
  </fieldset>
  <fieldset>
    <h2> Business Details</h2>
    <div class="form-group">
    <input type="text" class="form-control" name="lic_no" id="lic_no" placeholder="Trade License Number">
    </div>
    <div class="form-group">
    <label for="lName">Trade License Document</label>
    <input type="file" name="lic_doc" id="lic_doc" class="form-control">
    </div>
    <div class="form-group">
   
    <input type="text" class="form-control" name="gst_no" id="gst_no" placeholder="Enter GST Number">
    </div>
    <div class="form-group">
    <label for="lName">GST Document</label>
    <input type="file" name="gst_doc" id="gst_doc" class="form-control">
    </div>
    <div class="form-group">

    <input type="text" class="form-control" name="pan_no" id="pan_no" placeholder="Enter PAN Number">
    </div>
    <div class="form-group">
    <label for="lName">PAN Card</label>
    <input type="file" name="pan_doc" id="pan_doc"  class="form-control">
    </div>
    <div class="form-group">
    <label for="lName">ID Proof</label>
    <input type="file" name="id_doc" id="id_doc"  class="form-control" placeholder="Shipping Mode">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" name="ship" id="ship" placeholder="Shipping Mode">
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" />
  </fieldset>
  <fieldset>
    <h2>Bank Details</h2>
    <div class="form-group">
    <label for="mob">Your name in back document</label>
    <input type="text" class="form-control" id="bk_name" placeholder="Enter your name in back document" name="bk_name">
    </div>
    <div class="form-group">
    <label for="mob">Your back account Type</label>
    <input type="text" class="form-control" id="ac_type" placeholder="Account type " name="mac_typeob">
    </div>
    <div class="form-group">
    <label for="mob">Your Account Number</label>
    <input type="text" class="form-control" id="ac_no" placeholder="Account Number " name="ac_no">
    </div>
    <div class="form-group">
    <label for="mob">Your IFSC Code</label>
    <input type="text" class="form-control" id="ifsc" placeholder="Enter IFSC Code" name="ifsc">
    </div>
    <div class="form-group">
    <label for="mob">Signature</label>
    <input type="file" class="form-control" id="sig"  name="sig">
    </div>
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Submit" />
  </fieldset>
  </form>
 <script>
$(document).ready(function() {       
	$('#languages').multiselect({		
		nonSelectedText: 'Select Language'				
	});
});
 </script>
</div>
</div>
</div>



</footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<body>

<script>
$(document).ready(function(){
  var current = 1,current_step,next_step,steps;
  steps = $("fieldset").length;
  $(".next").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().next();
    next_step.show();
    current_step.hide();
    setProgressBar(++current);
   
  });
  $(".previous").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().prev();
    next_step.show();
    current_step.hide();
    setProgressBar(--current);
  });

  setProgressBar(current);
  // Change progress bar action
  function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width",percent+"%")
      .html(percent+"%");   
  }
});
</script>

</body>
</html>
