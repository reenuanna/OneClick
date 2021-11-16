@extends('admin.header')
@section('body')
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
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        </div>
          <div class="row">
          	<div class="col-sm-12">
              <table class="table">
              <thead class="table-warning">
              <tr>
              <th>SNO</th>
              <th>Product Name</th>
              <th>MRP</th>
              <th>Selling Price</th>
            <th>Brand</th>
            <th>Colour</th>
                <th>More</th>
              </tr>
              </thead>
              @foreach($result as $value)
            
              <tbody>
              <td></td>
                <td>{{$value->pr_name}}<br>
              <a href="{{asset('uploads/images/'.$value->pr_img)}}" > <img src="{{asset('uploads/images/'.$value->pr_img)}}" height="100px" alt=""></a>
                </td>
                <td>{{$value->pr_mrp}}</td>
                <td>{{$value->pr_selprice}} </td>
                <td>{{$value->pr_brand}} </td>
                <td>{{$value->pr_color}} </td>
                <td><a href="/moreProductview/{{$value->pr_id}}">View Details</a> 
                @if($value->pr_status==0)
                <p style='color:orange'>Pending Approvel</p>
                @elseif($value->pr_status==1)
                <p style='color:green'> Product Approved</p>
                @else
                <p style='color:red'>Product Rejected</p>
                @endif
                </td>
              </tbody>
              @endforeach
              </table>
          	</div>
>
          </div>
      
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection('body')