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
            <a href="/category">back</a>
              <table class="table">
              <thead class="table-warning">
              <tr>
              <th>Subcategory</th>
              </tr>
              </thead>
              @foreach($sub as $subcat)
              
              <tbody>
                <td>{{$subcat->sub_name}}</td>
              </tbody>
              @endforeach
              </table>
          	</div>
            <div class="col-sm-6">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Subcategory</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @foreach($result as $value)
              <form method="post" action="/addsubcat/{{$value->c_id}}">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Main Category</label>
                    <input type="text" class="form-control" id="txt_bs" name="m_cat" value="{{$value->category}}">
                    <label for="exampleInputEmail1">Sub Category</label>
                    <input type="text" class="form-control" id="txt_bs" name="sub_cat"placeholder="Enter Sub CAtegory" >

                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Submit</button>
                </div>
              </form>
              @endforeach
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