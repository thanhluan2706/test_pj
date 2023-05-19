@extends('admin.admin-header')
@extends('admin.sidebar')
@extends('admin.admin-footer')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Product Add</h1>
      </div>
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ url('/admin') }}"> Back</a>
    </div>
  </div><!-- /.container-fluid -->

  @if ($errors->any())
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <!-- Main content -->
  <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Name:</strong>
          <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Price:</strong>
          <input type="text" name="price" class="form-control" placeholder="Price">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Description:</strong>
          <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Image:</strong>
          <input type="file" name="image" class="form-control" placeholder="image">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <label for="inputManufacture">Manufacture</label>
          <select name="manu_id" id="inputManufacture" class="form-control custom-select">
            <option selected disabled>Select one</option>
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <label for="inputProtype">Protype</label>
          <select name="type_id" id="inputProtype" class="form-control custom-select">
            <option selected disabled>Select one</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <!-- type -->
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="inputFeature">Feature</label>
        <br>
        <input name="feature" type="checkbox" value="1" id="inputFeature" style="width: 30px; height: 30px;">
      </div>
      <div class="row">
        <!-- <div class="col-12">
          <input type="submit" value="Add" class="btn btn-success float-right">
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </div>
  </form>

  <!-- /.content -->
</div>
@endsection

