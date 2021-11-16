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
      @foreach($result as $value)
           <b>Vendor's Name : {{$value->v_name}}</b>
        <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="table-warning">
                    <tr>
                        <th>Selling Category</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$value->category}} </td>
                        <td>{{$value->sub_name}} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="table-warning">
                    <tr>
                        <th>Product Details</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
              </thead>
            
              <tbody>
                    <tr>
                        <td>Name :: {{$value->pr_name}}<br> </td>
                        <td>Details :: {{$value->pr_details}}</td>
                        <td>Warrenty :: {{$value->pr_war}}</td>
                        <td>Brand :: {{$value->pr_brand}} </td>
                        <td>Stock :: {{$value->pr_stk}} </td>
                    </tr>
              </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="table-warning">
                    <tr>
                        <th>Price Details</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
              </thead>
            
              <tbody>
                    <tr>
                        <td>MRP :: {{$value->pr_mrp}}<br> </td>
                        <td>Selling Price :: {{$value->pr_selprice}}</td>
                        <td>GST :: {{$value->pr_gst}}</td>
                        <td>Return :: {{$value->pr_return}} </td>
                        <td>Delivery :: {{$value->delivery}} </td>
                    </tr>
              </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="table-warning">
                    <tr>
                        <th>Size and Colour</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
              </thead>
            
              <tbody>
                    <tr>
                        <td>Length :: {{$value->pr_len}}<br> </td>
                        <td>Width :: {{$value->pr_width}}</td>
                        <td>Unit :: {{$value->pr_unit}}</td>
                        <td>Height :: {{$value->pr_height}} </td>
                        <td>Colour :: {{$value->pr_color}} </td>
                    </tr>
              </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="table-warning">
                    <tr>
                        <th>Image</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
              </thead>
            
              <tbody>
                    <tr>
                        <td>  <a href="{{asset('uploads/images/'.$value->pr_img)}}" > <img src="{{asset('uploads/images/'.$value->pr_img)}}" height="100px" alt=""></a></td>
                        <td></td>
                        <td></td>
                        <td> 
                @if($value->pr_status==0)
                <p style='color:orange'>Pending Approvel</p>
                @elseif($value->pr_status==1)
                <p style='color:green'> Product Approved</p>
                @else
                <p style='color:red'>Product Rejected</p>
                @endif</td>
                        <td> </td>
                    </tr>
                    <tr>
                    <td></td>
                    <td><a href="/prdapprove/{{$value->pr_id}}" class="btn btn-success"> Approve</a> </td>
                    <td></td>
                    <td><button type="button" id="mycart" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Reject</button>
 </td>
                    <td></td>
                    </tr>
              </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
   <div class="modal-content">
      <div class="modal-header"  >
         <h4 class="modal-title">{{$value->pr_name}}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
      <form method="post" class="frm" action="/prdareject/{{$value->pr_id}}">
                                    @csrf
                                 <table>
                                   <tr> <input type="hidden" name="pid" class="form-control" id="pid" value="{{$value->pr_id}} "></td>
                                       <td> Reason :</td>
                                    <td><textarea name="rsn" class="form-control" id="rsn"> </textarea></td>
                                    </tr>
                                 </table>
                             
                           </div>
                      <div class="modal-footer">
                   <input type="submit" class="btn btn-danger" value="OK">
                   </form>
                      </div>
   </div>
    
  </div>
</div>
</div>

        <!-- /.row (main row) --> @endforeach
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection('body')