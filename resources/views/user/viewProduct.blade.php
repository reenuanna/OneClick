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
                     @if (session('msg')) <p style="color:red"> {{ session('msg') }} </p> @endif

                        <div class="row">
                        @foreach($result as $pro)
                           <div class="col-lg-4 col-sm-4">
                              <div class="pro_box_main">
                                 <div class="product_img"><img src="{{asset('uploads/images/'.$pro->pr_img)}}" ></div>  
                              </div>
                           </div>
                           <div class="col-lg-8 col-sm-8">
                           <h4 class="shirt_text">{{$pro->pr_name}}</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">Rs.{{$pro->pr_selprice}}</span></p>
                                 <p>Brand : {{$pro->pr_brand}}</p>
                                 <p>Details : {{$pro->pr_details}}</p>
                                 <p>Warenty : {{$pro->pr_war}}</p>
                                 <p>Length : {{$pro->pr_len}}</p>
                                 <p>Color : {{$pro->pr_color}}</p>
                                
                                 <form method="post" class="frm" action="/buynow/{{$pro->pr_id}}">
                                    @csrf
                                    <table>
                                       <tr>
                                          <input type="hidden" name="uid" id="uid" class="form-control" value="{{session('userid')}}">
                                          <input type="hidden" name="pid" class="form-control" id="pid" value="{{$pro->pr_id}} "></td>
                                          <td> Quantity :</td>
                                          <td>  <input type="number" name="qnty" class="form-control" id="qnty" value="1" min="1" max="{{$pro->pr_stk}}">
                                          </td>
                                          <td><input type="hidden" name="price" class="form-control" id="price" value="{{$pro->pr_selprice}} "></td>
                                          <td>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          Available Coins: <b id="coins">0</b>
                                          <input type="hidden" id="coin" value="0" name="coin" class="form-control" >
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                          &nbsp; Total : </td>
                                          <td><input type="text" name="tot" id="tot" class="form-control" value="{{$pro->pr_selprice}}">
                                          </td>
                                       </tr>
                                    </table>
                                    <br>
                                    @if(session()->has('userid'))
                                    <div class="btn_main">
                                       <div><button type="submit" class="btn btn-warning">Buy Now</a></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;
                                          <div> <button type="button" id="mycart" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Add To Cart</button>
                                          <!-- <button type="button" id="mycart" class="btn btn-warning">Add To Cart </buton></div> -->
                                          </div>
                                       </div>
                                    </div>
                                    @else
                                    <div class="btn_main">
                                     to buy login<a href="/login">Login</a>
                                    </div>
                                    @endif
                                    @if (session('msg')) <p style="color:red"> {{ session('msg') }} </p> @endif

                                 </form>
                                
                                 <br>
                                
                           </div>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
<!-- ========================================================= -->
<div class="row">
<div class="col-sm-12">
<form id="ratingForm" method="POST">
<div class="form-group">
<h4>Rate this product</h4>
<button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<input type="hidden" class="form-control" id="rating" name="rating" value="1">
<input type="hidden" class="form-control" id="itemId" name="itemId" value="12345678">
</div>
<div class="form-group">
<label for="usr">Title*</label>
<input type="text" class="form-control" id="title" name="title" required>
</div>
<div class="form-group">
<label for="comment">Comment*</label>
<textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-info" id="saveReview">Save Review</button> <button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
</div>
</form>
</div>
</div>
<script type="text/javascript">
$('#ratingForm').on('submit', function(event){
event.preventDefault();
var formData = $(this).serialize();
$.ajax({
type : 'POST',
url : 'saveRating.php',
data : formData,
success:function(response){
$("#ratingForm")[0].reset();
window.setTimeout(function(){window.location.reload()},1000)
}
});
});
</script>
<!-- =========================================================== -->
        
        @foreach($result as $pro)

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
   <div class="modal-content">
      <div class="modal-header"  >
         <h4 class="modal-title">{{$pro->pr_name}}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
      <form method="post" class="frm" action="/addcart">
                                    @csrf
                                 <table>
                                   <tr>
                                      
                                         <input type="hidden" name="m-uid" id="m-uid" class="form-control" value="{{session('userid')}}">
                                         <input type="hidden" name="m-pid" class="form-control" id="m-pid" value="{{$pro->pr_id}} "></td>
                                       <td> Quantity :</td>
                                       <td>  <input type="number" name="m-qnty" class="form-control" id="m-qnty" value="1" min="1" max="{{$pro->pr_stk}}">
                                    </td>
                                    <td><input type="hidden" name="m-price" class="form-control" id="m-price" value="{{$pro->pr_selprice}}"></td>
                                    <td><input type="hidden" name="m-coin" class="form-control" id="m-coin" value="0"></td>

                                    </tr>
                                    <tr>
                                    <td>
                                    &nbsp; Total : </td>
                                    <td><input type="text" name="m-tot" id="m-tot" class="form-control" value="">
                                    </td>
                                 </tr>
                                 </table>
                             
                           </div>
                      <div class="modal-footer">
                   <input type="submit" class="btn btn-warning" value="ADD">
                   </form>
                      </div>
   </div>
    
  </div>
</div>
</div>
@endforeach

<script>
   $(document).ready(function(){
      var pr= $('#price').val(); //get selling price
      var coin =  parseInt(parseInt(pr)/150)*2; //calculate coins with product price
        $('#coin').val(coin); //display coins into text field
        $('#coins').html(coin); //display coins to html tag
      // main quantity change function
      $('#qnty').change(function(){
        
        var pr= $('#price').val();
        var qnty=$('#qnty').val();
        var total= parseInt(pr)*parseInt(qnty);
        $('#tot').val(total);
      });
      //Add to cart function
      $('#mycart').click(function(){
         //get value from the form
        var qnty=$('#qnty').val();
        var tot=$('#tot').val();
        var coin=$('#coin').val();
        $('#m-qnty').val(qnty); //view selected qnty to modal
       $('#m-tot').val(tot); 
       $('#m-coin').val(coin);//view total to modal
      //  confirm the cart function
       $('#m-qnty').change(function(){
       var mqnty=  $('#m-qnty').val();
       var pr= $('#m-price').val();
       var total= parseInt(pr)*parseInt(mqnty);
        $('#m-tot').val(total);
       });
     
      });
   });
</script>
@endsection()