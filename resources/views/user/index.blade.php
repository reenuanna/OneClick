@extends('user.header')
@section('body')
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <img src="images/banner.jpg">
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <img src="images/banner1.jpg">
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                             <img src="images/banner2.jpg">
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                             <img src="images/banner3.jpg">
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- fashion section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <!-- <h1 class="fashion_taital">Man & Woman Fashion</h1> -->
                     <div class="fashion_section_2">
                        <div class="row">
                        @foreach($result as $pro)
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">{{$pro->pr_name}}</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">Rs.{{$pro->pr_selprice}}</span></p>
                                 <div class="tshirt_img"><img src="{{asset('uploads/images/'.$pro->pr_img)}}"></div>
                                 <div class="btn_main">
                                 <a href="/viewProduct/{{$pro->pr_id}}" class="btn btn-outline-warning btn-block">View Product</a>

                                 </div>
                              </div>
                           </div>
                           
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
            </div>
           
         </div>
        
      </div>
      <!-- fashion section end -->
      <!-- electronic section start -->
    
      <!-- electronic section end -->
      <!-- jewellery  section start -->
 
      <!-- jewellery  section end -->
@endsection()

