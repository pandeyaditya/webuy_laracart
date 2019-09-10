@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Add Product </h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    @if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
	@endif
    <form role="form" action="{{ url('/admin/insertproduct') }}" method="post" enctype="multipart/form-data">
        <div class="box-body">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter title">
        </div>
        <div class="error">{{ $errors->first('title') }}</div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category">
        </div>
        <div class="error">{{ $errors->first('category') }}</div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter Category">
        </div>
        <div class="error">{{ $errors->first('description') }}</div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image">
        </div>
        <div class="error">{{ $errors->first('image') }}</div>
        <div class="form-group">
            <label for="price">price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
        </div>
        <div class="error">{{ $errors->first('price') }}</div>
        </div>
        <!-- /.box-body -->
        {{ csrf_field() }}
        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Add Product</button>
        </div>
    </form>

</div>

    </section>
    <!-- /.content -->
  </div>


<!-- /.box -->
@endsection('content')