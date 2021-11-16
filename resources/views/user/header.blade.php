<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>OneClick</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="/css/owl.carousel.min.css">
      <link rel="stylesoeet" href="/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
   </head>
   <body>
      <!-- banner bg main start -->
   
      <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="row">

         <div class="col-sm-1">
         <div class="logo"><a href="/"><img src="/images/logo.png"><br><b>OneClick</b></a></div>
         </div>
         <div class="col-sm-11">
            <div class="header_section_top">
               <div class="row">
               
                  <!-- <div class="col-sm-3"> -->
                  <!-- <div class="logo"><a href="index.html"><img src="images/logo.png"><span><b>OneClick</b></span></a></div></div> -->
                  <div class="col-sm-9">
                  
                     <div class="custom_menu">
                        <ul>
                           <li><a href="#">Best Sellers</a></li>
                           <li><a href="#">Gift Ideas</a></li>
                           <li><a href="#">New Releases</a></li>
                           <li><a href="#">Today's Deals</a></li>
                           <li><a href="#">Customer Service</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            </div>
</div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         
         <!-- logo section end -->
         <!-- header section start -->
        
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
            

                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.html">Home</a>
                     <a href="fashion.html">Fashion</a>
                     <a href="electronic.html">Electronic</a>
                     <a href="jewellery.html">Jewellery</a>
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="/images/toggle-icon.png"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     @foreach($cat as $catVal)
                        <a class="dropdown-item" href="#">{{$catVal->category}}</a>
                        @endforeach
                     </div>
                     <script>
                     $(document).ready(function(){
                        $('.dropdown-toggle').click(function(){
                           alert('hi')
                        });
                     });
                     </script>
                  </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search this blog">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                  @if(session()->has('userid'))
                     <div class="login_menu">
                        <ul>
                        <li><a href="/Profile">
                        @foreach($user as $urval)
                            <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">{{$urval->ur_name}}</span></a> 
                              @endforeach
                           </li>
                           <li><a href="/cart">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a> 
                           </li>
                           <li><a href="/cart">
                           <i class="fa fa-database" aria-hidden="true"></i>
                           <sup>{{$urval->ur_coins}} </sup><span class="padding_10">Coins  </span></a> 
                           </li>
                          
                           <li><a href="/logout">
                           <i class="fa fa-sign-out" aria-hidden="true"></i>
                              <span class="padding_10">Logout</span></a>

                           </li>
                        </ul>
                     </div>
                     @else
                     <div class="login_menu">
                        <ul>
                           <li><a href="/cart">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><a href="/login">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">Sign In</span></a>

                           </li>
                        </ul>
                     </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
@yield('body')

      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.html"><img src="/images/footer-logo.png"></a></div>
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            
            <div class="footer_menu">
               <ul>
                  <li><a href="#">Best Sellers</a></li>
                  <li><a href="#">Gift Ideas</a></li>
                  <li><a href="#">New Releases</a></li>
                  <li><a href="#">Today's Deals</a></li>
                  <li><a href="#">Customer Service</a></li>
               </ul>
            </div>
            <div class="location_main">Help Line  Number : <a href="#">+1 1800 1200 1200</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="/js/jquery.min.js"></script>
      <script src="/js/popper.min.js"></script>
      <script src="/js/bootstrap.bundle.min.js"></script>
      <script src="/js/jquery-3.0.0.min.js"></script>
      <script src="/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="/js/custom.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>