@extends('user.header')
@section('body')
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
              
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
                     <a href="/">Home</a>&nbsp;&nbsp; >&nbsp;&nbsp; <a href="/cart"> Cart</a> &nbsp;&nbsp; >&nbsp;&nbsp;<a href="/cartCheckout" class=" text-warning">Checkout</a>       
                     <div class="fashion_section_2">
                     
                        <div class="row">

                           <div class="col-lg-12 col-sm-12">
                         
                              <div class="box_main_cart">
                              
                                <form method="post" action="/order1">
                                @csrf
                                @foreach($user as $ur_val)
                                    Delivary Address
                                    <textarea name="address" id="address" class="form-control">{{$ur_val->ur_name}}</textarea>
                                    @endforeach
                                    <br>
                                    <table class="table">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th> </th>
                                        </tr>
                                        @foreach($ck as $cartVal)
                                        <tr>
                                        <td>{{$cartVal->pr_name}}<br>
                                        <img src="{{asset('uploads/images/'.$cartVal->pr_img)}}" alt="" class="cartimg">
                                         <br>Price : {{$cartVal->pr_selprice}} /-
                                         <input type="hidden" value="{{$cartVal->pr_selprice}}" id="price" name="price">
                                         <input type="hidden" value="{{$cartVal->pr_id}}" name="pid">
                                         </td>
                                         <td>
                                          <input type="number" name="qnty" id="qnty" value="{{$cartVal->qnty}}" class="form-control" min="1" max="{{$cartVal->pr_stk}}"><br>
                                          <br><br>
                                          Available Coins: <b id="coins">{{$cartVal->c_coins}}</b>
                                          <input type="hidden" id="coin" value="{{$cartVal->c_coins}}" name="coin" class="form-control" >
                                           
                                       </td>
                                       
                                        <td>
                                      <b> <i>Rs. <span id="tot1">{{$cartVal->total}}</span></i></b>
                                        <input type="hidden" name="tot" id="tot" value="{{$cartVal->total}}" class="form-control">
                                        </td>
                                        <td> </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    @foreach($csum as $sm)
                                    Total Sum : {{$sm->csum}}
                                    <input type="hidden" name="tsum" id="tsum" value="{{$sm->csum}}">
                                  &nbsp; &nbsp; &nbsp; &nbsp; Total Coins:{{$sm->cosum}}
                                   <input type="hidden" name="tcoin" id="tcoin" value="{{$sm->cosum}}">

                                    @endforeach
                                    <input type="submit" name="buy"  class="btn btn-warning btn-block" value="Checkout">
                                    
                              </div>
                              <script>
    $(document).ready(function(){
     
      $('#qnty').change(function(){
      //   alert('hi')
        var pr= $('#price').val();
        var qnty=$('#qnty').val();
        var total= parseInt(pr)*parseInt(qnty);
        
        $('#tot').val(total);
        $('#tot1').html(total);
      });
    });
                              </script>
                           </div>
                           
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