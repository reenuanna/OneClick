@extends('user.header')
@section('body')
<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3 col-md-offset-6">
                    @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> {{ $message }}
                    </div>
                    @endif
                     @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> {{ $message }}
                    </div>
                    @endif 
                   <a href="/" class="btn btn-outline-success">Continue Shopping</a>
                   
                </div>
            </div>
        </div>
    </main>
</div>
@endsection