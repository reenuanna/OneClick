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
     <a href="/">Home</a>&nbsp;&nbsp; >&nbsp;&nbsp; <a href="/cart" class="active text-warning" > Cart</a>
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
                              <!-- <form method="post" action="">
                              @csrf -->
                             
                                    <table class="table">
                                        <tr>
                                            <th></th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th> </th>
                                            <th></th>
                                        </tr>
                                        @foreach($cart as $cartVal)
                                        <!-- <form method="post" action="">
                                         @csrf -->
                                        <tr>
                                        <!-- <td></td> -->
                                        <!-- <td> <input type="checkbox" checked="checked" name="chk" id="chk"> -->
                                        <input type="hidden" name="pid" id="pid" value="{{$cartVal->pr_id}}" class="pid form-control">
                                       <input type="hidden" name="userid" id="uid" value="{{session('userid')}}">
                                        </td>
                                        <td>{{$cartVal->pr_name}}<br>
                                        <img src="{{asset('uploads/images/'.$cartVal->pr_img)}}" alt="" class="cartimg">
                                         <br>Price : {{$cartVal->pr_selprice}} /-
                                         <input type="hidden" name="price" id="price" value="{{$cartVal->pr_selprice}}">
                                         </td>
                                         <td> <input type="number" name="qnty" id="qnty" value="{{$cartVal->qnty}}" class="qnty form-control" min="1" max="{{$cartVal->pr_stk}}"> 
                                         Available Coins: <b id="coins">{{$cartVal->c_coins}}</b>
                                          <input type="hidden" id="coin" value="{{$cartVal->c_coins}}" name="coin" class="form-control" >
                                           </td>
                                        <td>
                                        <i>Rs.<span id="tot">{{$cartVal->total}}</span></i>
                                        <input type="hidden" name="tot" value="{{$cartVal->total}}" id="tot1">
                                        </td>
                                        <td><a href=""><i class="fa fa-trash" style="color:red"> Remove</i></a></td>
                                        <td> <a href=" buynow1/{{$cartVal->pr_id}}" class="btn btn-warning">Buy</a></td>
                                       
                                        
                                        @endforeach
                                      
                                 </tr>  </table>
                                    <!-- </form> -->
                                    @foreach($csum as $sm)
                                    Total Sum : {{$sm->csum}}
                                    <input type="hidden" name="tsum" id="tsum" value="{{$sm->csum}}">
                                  &nbsp; &nbsp; &nbsp; &nbsp; Total Coins:{{$sm->cosum}}
                                   <input type="hidden" name="tcoin" id="tcoin" value="{{$sm->cosum}}">

                                    @endforeach
                                <a href="cartCheckout" name="order" id="orde" class=" buynow btn btn-warning btn-block">Place Order</a>
                              </div>
                           </div>
                           <script>
    $(document).ready(function(){
    

    $(".qnty").on('change',function() {
     
    // Get the row containing the input
    var row = $(this).closest('tr');
    // var p = $('#price').val();
    var pid = parseInt(row.find("#pid").val());    
    var qty = parseInt(row.find(this).val());
    var price = parseInt(row.find('#price').val());
    var uid = parseInt(row.find('#uid').val());
    var tot= parseInt(qty)*parseInt(price);
   //  var c=row.find('#coin').val()
   //  alert(c)
    // var total =  parseInt(qty)*parseInt(price);
    row.find('#tot').html(tot);
    row.find('#tot1').val(tot);
    
    //  $("#tot_amount").val(total);
            $.ajax({
                    url: "/updatecart/"+pid,
                    method: 'get',
                    cache: false,
                    data: {
                        uid: uid,
                        qty: qty,
                        price: price,
                        tot:tot,
                    },
                 
                    success: function(response) {
                        // alert(response)
                        console.log(response);
                    }
                });
                location.reload(true);

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
      <!-- fashion section end -->
      <!-- electronic section start -->
    
      <!-- electronic section end -->
      <!-- jewellery  section start -->
 
      <!-- jewellery  section end -->
@endsection()