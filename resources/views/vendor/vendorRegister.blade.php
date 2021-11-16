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
<div class="text"> <b>Sign Up</b><p>Create your seller account.</p></div>
<div class="login">
<form method="post" action="/send">
@csrf
    <input type="text" class="form-control" placeholder="Enter your Mobile Number" name="mob" id="mob" required>
    <i id="mob_error"></i>
    <input type="hidden" class="form-control"  name="otp_num" id="otp_num">
    <input type="submit" class="btn btn-warning btn-lg btn-block" value="Send OTP" id="otp">
    </form>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
  $("#otp").click(function(){

    var otp = Math.floor((Math.random() * 10000) + 99999);
   alert(otp);
   $('#otp_num').val(otp);
  });

    $('#mob').keypress(function()
    {
                var phone=$('#mob').val();
    intRegex = /^[0-9]*$/;
                 if(!intRegex.test(phone))
                {          
                $("#mob").css("background-color", "pink");
               
                $('#mob_error').html("Only Numbers are allowed.");
               // alert('invalid');
               // return false;s
                }
                 else{
                $("#mob").css("background-color", "white");
                $('#mob_error').html("");
                }
        });
        $('#mob').keypress(function()
             {
                  var phone=$('#mob').val();
                if((phone.length<9)||(phone.length>9))
                {
                      $("#mob").css("background-color", "pink");
                      $('#mob_error').html("Mobile number is invalid.");
                }
                // return true;
                else{
                $("#mob").css("background-color", "white");
                $('#mob_error').html("");
                }
        });
  });

</script>


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
