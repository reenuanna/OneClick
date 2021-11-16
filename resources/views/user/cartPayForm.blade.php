@extends('user.header')
@section('body')
<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3 col-md-offset-6">
                <a href="/">Home</a>&nbsp;&nbsp; >&nbsp;&nbsp; <a href="/cart"> Cart</a> &nbsp;&nbsp; >&nbsp;&nbsp;<a href="/cartCheckout">Checkout</a> &nbsp;&nbsp; >&nbsp;&nbsp;<a href="/cartPayForm">Payment</a>       

                    <div class="pro_box_main">
                    
                        <div class="card card-default"> 
                            <div class="card-body text-center">

                                <form action="{{ route('razorpay.payment.cartstore') }}" method="POST" >
                                    @csrf
                                    <table class="table">
                                    <tr>
                                    <th>Product Name</th>
                                    <th> Quantity</th>
                                    <th>Amount</th>
                                    </tr>
                                    @foreach($ck as $pay)
                                    <tr>
                                   <td> {{$pay->pr_name}}
                                    <input type="hidden" name="pid" id="pid" value="{{$pay->pr_name}}">
                                    <br>

                                    <img src="{{asset('uploads/images/'.$pay->pr_img)}}" class="cartimg" >  

                                    <br></td>
                                    <td>
                                 {{$pay->od_qlty}}
                                    <input type="hidden" name="qty" id="qty" value="{{$pay->od_qlty}}"><br>
                                   </td>
                                   <td> {{$pay->od_totprice}}/-
                                    <input type="hidden" name="tot" id="tot" value="{{$pay->od_totprice}}"><br>
                                   </td>
                                   </tr>
                                    @endforeach
                                    </table>
                                    @foreach($cart as $sm)
                                    Total Amount to Pay : {{$sm->csum}}<br>
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="{{ env('RAZORPAY_KEY') }}"
                                        data-amount="{{$sm->csum}}00"
                                        data-currency="INR"
                                        data-buttontext="Pay"
                                        data-name="OneClick"
                                        data-description="Rozerpay"
                                        data-image="/dist/img/logo.png"
                                        data-prefill.name="name"
                                        data-prefill.email="email"
                                        data-theme.color="orange">
                                    </script>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection