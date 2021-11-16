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
          	<div class="col-sm-6">
              <table class="table">
              <thead class="table-warning">
              <tr>
              <th>Selling Category</th>
              <th></th>
              </tr>
              </thead>
              @foreach($result as $value)
              
              <tbody>
                <td>{{$value->category}}</td>
               <td><a href="/showSubCat/{{$value->c_id}}"><i class="fas fa-plus bg-light"></i></a></td>
              </tbody>
              @endforeach
              </table>
          	</div>
            <div class="col-sm-6">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/addcategory">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <input type="text" class="form-control" id="txt_bs" name="business" placeholder="Enter Category">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Submit</button>
                </div>
              </form>
          </div>
          </div>
      
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection('body')