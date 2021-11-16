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
      <a href="/vendorDetails">Back to Vendor Details</a>
        <!-- Small boxes (Stat box) -->
          <div class="row">
          
          @foreach($ven_more as $value)
          
          	<div class="col-sm-6">
              <div class="card card-warning">
              <div class="card-body">
              <h3 class="text-center p-3 mb-2 bg-info  text-white">Company Information</h3>
              <table class="table table-hover cmpy_value">
              <tr>
                <th>Company Name</th>
                <td>
                {{$value->v_cmpany}}
              </td>
              </tr>
              <tr>
              <th>Office Number</th>
              <td>{{$value->v_ph}}
              </td>

              </tr>
              <tr>
              <th>Location</th>
              <td> {{$value->location}} , 
                {{$value->district}} , {{$value->v_state}}
            </td>
              </tr>
              <tr>
              <th>Business</th>
              <td>{{$value->business_type}}</td>
              </tr>
              <tr>
              <td><button class="fa fa-edit" id="cmpy"></button></td>
              <td></td>
                </tr>
                
              </table>
              
              <form action="/savecmpy/{{$value->v_id}}" method="post" id="formcmpy">
                @csrf
              <table class="table table-hover">
              <tr>
                <th>Company Name</th>
                <td>
                <input type="text" name="cmp"id="cmp" class="form-control cmpy_edit" value="{{$value->v_cmpany}}">
              </td>
              </tr>
              <tr>
              <th>Office Number</th>
             <td> <input type="text" name="phno"id="phno" class="form-control cmpy_edit" value="{{$value->v_ph}}">
              </td>

              </tr>
              <tr>
              <th>Location</th>
              <td>
                <input type="text" class="form-control cmpy_edit" name="cmp_loc" value="{{$value->location}},"id="cmcmp_locp">
                <input type="text"class="form-control cmpy_edit"  name="cmp_dist"id="cmp_dist" value="{{$value->district}}">
                <input type="text" class="form-control cmpy_edit" name="cmp_state" value="{{$value->v_state}}"id="cmp_state">
            </td>
              </tr>
              <tr>
              <th>Business</th>
              <td>
              <input type="text" class="form-control cmpy_edit" name="cmp_bis"id="cmp_bis" value="{{$value->business_type}}">

              </td>
              </tr>
              <tr>
              <td></td>
              <td><input type="submit" class="btn btn-primary cmpy_save" name="cmpy_save" value="Save Changes" id="cmpy_save"></td>
                </tr>
                
              </table>
              </form>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <script>
                $('#formcmpy').hide();
               $(document).ready(function(){
                
                  $('#cmpy').click(function(){
                    // alert('hi')
                    //   $('.cmpy_edit').attr('type','text');
                    $('.cmpy_value').hide();
                    $('#formcmpy').show();
                  });
                });
              </script>
          	</div>
              </div>
              </div>
             
              <div class="col-sm-6">
              <div class="card card-warning">
              <div class="card-body">
              <h3 class="text-center p-3 mb-2 bg-danger  text-white">Store Information</h3>
              <table class="table table-hover">
              
              <tr>
              <th>Store Name</th>
              <td>{{$value->store_name}}</td>
              </tr>
              <tr>
              <th>Store Logo</th>
              <td><img src="{{ asset('uploads/images/'.$value->store_logo)}}" height="70px" ></td>
              </tr>
              <tr>
              <th>Selling Categorys</th>
              <td>
              @foreach($ven_cat as $cat){{$cat->category}} |  @endforeach
            </td>
              
              </tr>
              </table>
          	    </div>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
              <div class="card card-warning">
              <div class="card-body">
              <h3 class="text-center p-3 mb-2 bg-success  text-white">Business Details</h3>
              <table class="table table-hover">
              
              <tr>
              <th>Licence Number</th>
              <td>{{$value->lic_no}}</td>
              <th>Licence Document</th>
              <td><img src="{{ asset('uploads/images/'.$value->lic_doc)}}" height="70px" ></td>
              </tr>
              <tr>
              <th>GST Number</th>
              <td>
              {{$value->gst_no}}
            </td>
            <th>GST Document</th>
              <td>
              <img src="{{ asset('uploads/images/'.$value->gst_doc )}}" height="70px" >
            </td>
              </tr>

              <tr>
              <th>PAN Number</th>
              <td>
              {{$value->pan_no}}
            </td>
            <th>PAN Card</th>
              <td>
              <img src="{{ asset('uploads/images/'.$value->pan_card)}}" height="70px" >
            </td>
              </tr>

              <tr>
              <th>ID Proof</th>
              <td>
              <img src="{{ asset('uploads/images/'.$value->id_doc)}}" height="70px" >
            </td>
            <th>Shipping Mode </th>
              <td>
              {{$value->ship}}
            </td>
              </tr>
              </table>
          	</div>
              </div>
              </div>
              <div class="col-sm-6">
              <div class="card card-warning">
              <div class="card-body">
              <h3 class="text-center p-3 mb-2 bg-warning  text-white">Bank Details</h3>
              <table class="table table-hover">
              
              <tr>
              <th>Name in Bank Doc</th>
              <td></td>
              <td>{{$value->bk_name}}</td>
              </tr>
              <tr>
              <th>Account Type</th>
              <td></td>
              <td>{{$value->ac_type}}</td>
              </tr>
              <tr>
              <th>Account Number</th>
              <td></td>
              <td>{{$value->ac_no}}</td>
              </tr>
              <tr>
              <th>IFSC Code</th>
              <td></td>
              <td>{{$value->ifsc}}</td>
              </tr>
              <tr>
              <th>Signature</th>
              <td></td>
              <td><img src="{{ asset('uploads/images/'.$value->sig)}}" height="70px" ></td>
              
            </tr>
           
              </table>

          
          	</div>
            
              </div>
              
              </div>
              &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
              &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
              &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
              &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
              <a href="/venapprove/{{$value->v_id}}" class="btn btn-success">APPROVE</a>
     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
      &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
     &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
      &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
     &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
     
     <a href="/venreject/{{$value->v_id}}" class="btn btn-danger">REJECT</a> 
              </div>
              @endforeach
      <br>
      </div>
    </section>
   
  </div>
  @endsection('body')