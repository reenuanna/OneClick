@extends('vendor.header')
@section('body')
@foreach($result as $user)
@if($user->approve_status==1)
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="container">
      <div class="row">
            <!-- Small boxes (Stat box) -->
            <div class="col-sm-12">
              <a href="/productForm" class="btn">Add New</a>
            <table class="table">
            <thead class="bg-info">
            <tr>
                <th>Product</th>
                <th>Image</th>
                <th>MRP</th>
                <th>Selling Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($prd as $pval)
            <tr>
            <td>{{$pval->pr_name}} </td>
            <td><img src="{{asset('uploads/images/'.$pval->pr_img)}}" alt="img" height="100">  </td>
            <td>{{$pval->pr_mrp}} </td>
            <td>{{$pval->pr_selprice}} </td>
            <td> {{$pval->pr_stk}}</td>
            @if($pval->pr_status==0)
            <td style="color:orange">Pending Aprovel</td>
            @elseif($pval->pr_status==1)
            <td  style="color:green">Approved</td>
            @else
            <td  style="color:red">Rejected</td>
            @endif
            <td><a href=""><i class="icon fa fa-edit "><span class="cname"> Edit</span></i></a><br> 
            <a href=""><i class="fa fa-eye"><span class="cname"> View</span></i></a>
            </td>
            </tr>
           
            @endforeach
            </tbody>
            </table>
            </div>
        </div>
    </section>



    <!-- /.content -->
</div>
@elseif($user->approve_status==2)
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="container">
      <div class="row">
            <!-- Small boxes (Stat box) -->
            <div class="col-sm-12">
            <script>
    swal(" Registration is  Rejected ! !", "contact no\ :9605487670", "warning");
  
</script>
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          <div class="row">
          	<div class="col-sm-12">
              <div class="small-box">
              <b>CONTACT ADMIN : 9605487670 </b>
          		  <img src="/dist/img/welcome.jpg" width="100%">
              </div>
          	</div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
            
            </div>
        </div>
    </section>



    <!-- /.content -->
</div>
@else
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="container">
      <div class="row">
            <!-- Small boxes (Stat box) -->
            <div class="col-sm-12">
            <script>
    swal("Registration is Not Approved !", "contact no\ :9605487670", "warning");
  
</script>
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          <div class="row">
          	<div class="col-sm-12">
              <div class="small-box">
              <b>CONTACT ADMIN : 9605487670 </b>
          		  <img src="/dist/img/welcome.jpg" width="100%">
              </div>
          	</div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
            
            </div>
        </div>
    </section>



    <!-- /.content -->
</div>
@endif
@endforeach
  @endsection('body')