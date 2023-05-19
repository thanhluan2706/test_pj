@extends('admin.admin-header')
@extends('admin.sidebar')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Update Edit</h1>
        </div>
      </div>
      <div class="pull-right">
      <a class="btn btn-primary" href="{{ url('/admin') }}"> Back</a>
    </div>
    </div><!-- /.container-fluid -->
  </section>

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
  <section class="content">
    <form action="{{ route('update',$products->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="hidden" name="id" value="$products->id">
                <input value="{{ $products->name }}" name="name" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputprice">Price</label>
                <input value="{{ $products->price }}" type="text" name="price" id="text" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Image</label>
                <input name="image" type="file" id="inputName" class="form-control">
                <img src="/img/{{ $products->image }}" alt="">
              </div>
              <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea name="description" id="inputDescription" class="form-control" rows="4">
                {{ $products->description }}
                </textarea>
              </div>
              <div class="form-group">
                <label for="inputprotype">Manufacture</label>
                @foreach($manu->products as $value)
                <select name="manufacture" id="inputprotype" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option value="{{ $value['manu_id']}}">{{ $value['manu_name'] }}</option>
                  <option value="2">2</option>
                  <!-- manu -->
                </select>
                @endforeach
              </div>
              <div class="form-group">
                <label for="inputprotype">Protype</label>
                <select name="protype" id="inputprotype" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option value="{{ $products->type_id }}">1</option>
                  <option value="2">2</option>
                  <!-- type -->
                </select>
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Feature</label>
                @if ($products->feature == 1)
                <input checked name="feature" type="checkbox" value="1" id="inputProjectLeader" style="width: 30px; height: 30px;">
                @else
                <input name="feature" type="checkbox" value="0" id="inputProjectLeader" style="width: 30px; height: 30px;">
                @endif
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
      <div class="row">
        <div class="col-12">
          <!-- <input type="submit" value="Update Product" class="btn btn-success float-right"> -->
          <button type="submit" class="btn btn-success float-right">Update product</button>
        </div>
      </div>
    </form>
  </section>
  <!-- /.content -->
</div>
@endsection
<!-- /.content-wrapper -->
<footer>

</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>
</body>

</html>