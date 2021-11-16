@extends('vendor.header')
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
  <form method="post" action="/savePrd" enctype="multipart/form-data">
          @csrf
    <!-- Main content -->
    <section class="container">
      <div class="row">
        <!-- Small boxes (Stat box) -->
        <div class="col-sm-6">
          <table class="table">
            <thead class="table-warning">
              <tr>
                <th>Selling Category</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                <select id="cat" class="form-control" name="cat">
                <option selected="selected" disabled="disabled">Select Category</option>
                @foreach($cat as $value)
                <option value="{{$value->c_id}}">{{$value->category}}</option>
                @endforeach
                </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-sm-6" style="display:none" id="subs">
          <table class="table">
            <thead class="table-warning">
              <tr>
                <th>Sub Category</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <select id="sub" class="form-control" name="sub">
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <section class="container">
      <div class="row">
        <div class=col-sm-12>
          <table class="table">
            <thead class="table-warning">
              <tr>
                <th>Add Product </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <td>
              <div class="row">
                <div class="col-sm-6">
                  Product Name <input type="text" name="pr_name" id="pr_name" class="form-control">
                  Choose Your Brand <input type="text" name="pr_brand" id="pr_brand" class="form-control">
                  <!-- Upload Image<input type="file" name="pr_img" id="pr_img" class="form-control"><br> -->
                   Stock<input type="text" name="pr_stk" id="pr_stk" class="form-control"><br>
                  <!-- <input type="submit" name="save" id="save" class="btn btn-warning"> -->
                </div>
                <div class="col-sm-6">
                  Product Description <textarea name="pr_des" id="pr_des" class="form-control"></textarea><br>  
                  Warranty Details <textarea name="pr_war" id="pr_war" class="form-control"></textarea>
                </div>
              </div>
              </td>
              </tr>
              </tbody>
              </table>
              </div>
              </secion>
              <section class="container">
              <div class="row">
                 <div class=col-sm-12>
                  <table class="table">
                    <thead class="table-warning">
                      <tr>
                        <th>Pricing Details</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="row">
                            <div class="col-sm-6">
                                MRP<input type="text" name="mrp" id="mrp" class="form-control">
                                Selling Price<input type="text" name="sel" id="sel" class="form-control">
                               
                            </div>
                            <div class="col-sm-6">
                              
                                GST<input type="text" name="gst" id="gst" class="form-control">
                              <br>  NON-Returnable &nbsp;<input type="checkbox" name="n_return" id="n_return" class="form-input-check">
                              &nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp; Free Delivery&nbsp;<input type="checkbox" name="del" id="del" class="form-input-check"></td>
                            </div>
                          </div>
                        <td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
    </section>

    <section class="container">
              <div class="row">
                 <div class=col-sm-12>
                  <table class="table">
                    <thead class="table-warning">
                      <tr>
                        <th>Size and weight</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <div class="row">
                            <div class="col-sm-6">
                                <td>Length<input type="text" name="len" id="len" class="form-control"></td>
                                <td>Width<input type="text" name="wid" id="wid" class="form-control"></td>
                               <td> Height<input type="text" name="hig" id="hig" class="form-control"></td>
                               <td> Unit<input type="text" name="unt" id="unt" class="form-control"></td>
                               <td> Colour<input type="text" name="col" id="col" class="form-control"></td>
                            </div>
                            </div>
                            </tr>
                            <tr>
                    </tbody>
                  </table>
                </div>
              </div>
    </section>

    <section class="container">
              <div class="row">
                 <div class=col-sm-12>
                  <table class="table">
                    <thead class="table-warning">
                      <tr>
                        <th>Images</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <div class="row">
                            <div class="col-sm-6">
                                <td>image
                                <!-- <input type="file" name="images[]" multiple class="form-control"> -->
                                <!-- <input type="file" name="img" id="img" class="form-control"> -->
                                <div class="form-group">
                                  <input type="file" name="images[]" multiple class="form-control" accept="image/*">
                                  <!-- @if ($errors->has('files'))
                                  @foreach ($errors->get('files') as $error) -->
                                  <span class="invalid-feedback" role="alert">
                                  <!-- <strong>{{ $error }}</strong> -->
                                  </span>
                                  <!-- @endforeach
                                  @endif -->
                                </div>    
                                
                                
                                
                                </td> 
                                <td></td>
                            </div>
                            </div>
                            </tr>
                            <tr>
                            <td><input type="submit" name="save" class="btn btn-success">
                            </tr>
                    </tbody>
                  </table>
                </div>
              </div>
    </section>


  </form>
</div>
    <script>
     
     $(document).ready(function(){
		$("#cat").on('change', function()
		{
      var catid=$("#cat").val();
      // alert(catid);    // alert('hi');
    
    $.ajax({
				type:"get",
				url:"/prdSubCat/"+catid,
				success:function(result)
				{
          // alert(result);
					$('#sub').html(result);
				}
			});
      $("#subs").show();
  });
     });
    </script>
    <!-- /.content -->
  </div>
  @endsection('body')