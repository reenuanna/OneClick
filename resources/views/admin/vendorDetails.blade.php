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
          	<div class="col-sm-12">
              <h3 class="text-center p-3 mb-2 bg-light  text-white">Vendor Details</h3>
              <table class="table">
              <thead class="table-warning">
              <tr>
              <th>Name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Vendor Status</th>
              <th>Approvel Status</th>
              <th>Action</th>
              </tr>
              </thead>
              @foreach($ven_dtl as $value)
              
              <tbody>
                <td>{{$value->v_name}}</td>
               <td>{{$value->v_mobile}}</td>
               <td>{{$value->v_email}}</td>
               @if($value->reg_status==0 && $value->approve_status==0)
               <td style="color:red">Registration Pending</td>
               <td></td>
               
               @elseif($value->reg_status==1 && $value->approve_status==0)
               <td style="color:green">Registration Completed</td>
               <td style="color:red">Approvel Pending</td>
               @else
               <td style="color:green">Registration Completed</td>
               <td style="color:green">Approved</td>
               @endif
             
              <td><a href="/moreVenderDetails/{{$value->v_id}}" >View More..</a></td>
              
              </tbody>
              @endforeach
              </table>
          	</div>
      
      
      </div>
    </section>
   
  </div>
  @endsection('body')