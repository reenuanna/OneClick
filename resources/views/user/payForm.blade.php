@extends('user.header')
@section('body')
<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3 col-md-offset-6">
                    <!-- @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> {{ $message }}
                    </div>
                    @endif -->
                    <!-- @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> {{ $message }}
                    </div>
                    @endif -->
                    <!-- @if (session('success')) <p style="color:red"> {{ session('success') }} </p> @endif -->
                    <div class="pro_box_main">
                    
                        <div class="card card-default"> 
                            <div class="card-body text-center">

                                <form action="{{ route('razorpay.payment.store') }}" method="POST" >
                                    @csrf
                                    Product Name : {{$pay->pr_name}}
                                    <input type="hidden" name="pid" id="pid" value="{{$pay->pr_name}}">
                                    <br>

                                    <img src="{{asset('uploads/images/'.$pay->pr_img)}}" class="payimg" >  

                                    <br>
                                    Quantity : {{$pay->od_qlty}}
                                    <input type="hidden" name="qty" id="qty" value="{{$pay->od_qlty}}"><br>
                                    Amount to Pay : {{$pay->od_totprice}}/-
                                    <input type="hidden" name="tot" id="tot" value="{{$pay->od_totprice}}"><br>

                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="{{ env('RAZORPAY_KEY') }}"
                                        data-amount="{{$amt}}00"
                                        data-currency="INR"
                                        data-buttontext="Pay"
                                        data-name="OneClick"
                                        data-description="Rozerpay"
                                        data-image="/dist/img/logo.png"
                                        data-prefill.name="name"
                                        data-prefill.email="email"
                                        data-theme.color="orange">
                                    </script>
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