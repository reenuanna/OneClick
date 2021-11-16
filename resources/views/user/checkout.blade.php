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
                     <div class="fashion_section_2">
                        <div class="row">
                       
                           <div class="col-lg-12 col-sm-12">
                              <div class="box_main_cart">
                                <form method="post" action="/order">
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
                                          <input type="number"  name="qnty" id="qnty" value="{{$cartVal->qnty}}" class="form-control" min="1" max="{{$cartVal->pr_stk}}"><br>
                                          <br><br>
                                          Available Coins for this Product: <b id="coins">{{$cartVal->c_coins}}</b>
                                          <input type="hidden" id="coin" value="{{$cartVal->c_coins}}" name="coin" class="form-control" >
                                           </td>

                                        <td>
                                      <b> <i>Rs. <span id="tot1">{{$cartVal->total}}</span></i></b>
                                        <input type="hidden" name="tot" id="tot" value="{{$cartVal->total}}" class="form-control">
                                       <br><br>
                                       <!-- <div> <button type="button" id="mycart" class="btn btn-warning">Add To Cart</button> -->

                                       <div>Use coins for purchase :<br>
                                       Total Coins:
                                       @foreach($user as $urval)
                                        {{$urval->ur_coins}}
                                       <br>
                                        <input type="number" min="0" name="p_coins" id="p_coins" step="2" max=" {{$urval->ur_coins}}" value="0"></div>
                                       <p id="gtot"></p>
                                        @endforeach
                                        </td>
                                        <td> </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    <!-- <button id="rzp-button1">Pay</button> -->
                                    <input type="submit" class="btn btn-warning btn-block" value="CheckOut"></a>

                                    <!-- <a href="/payment/{{$cartVal->total}}" class="btn btn-warning btn-block">CheckOut</a> -->
                                    </form>
                              </div>

                              <script>
    $(document).ready(function(){
      // main quantity change function
      $('#qnty').change(function(){
      //   alert('hi')
        var pr= $('#price').val();
        var qnty=$('#qnty').val();
        var total= parseInt(pr)*parseInt(qnty);
        
        $('#tot').val(total);
        $('#tot1').html(total);
      });
      $('#p_coins').change(function(){
         var total=$('#tot').val();
         var n_coins=$('#p_coins').val();
         var camt=75*n_coins;
         var gtot=total-camt;
         if(total<camt)
         {
            var points=n_coins-2;
            $('#p_coins').attr("max",points);
            //

               swal("No more coins avilable", "maximum coins:"+points, "warning");
               $('#p_coins').attr("value",points);
         }
         else{
            $('#gtot').html(gtot);
         }
         
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

@endsection()