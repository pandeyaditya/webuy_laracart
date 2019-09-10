@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        Fixed Layout
        <small>Blank example to the fixed layout</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Layout</a></li>
        <li class="active">Fixed</li>
      </ol>
    </section> -->

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
    <form role="form" action="{{ url('/admin/insertcategory') }}" method="post">
        <div class="box-body">
            <div class="form-group">
                <label for="title">Category Name</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Category Name">
            </div> 
            <div class="error">{{ $errors->first('title') }}</div>           
        </div>
        <!-- /.box-body -->
        {{ csrf_field() }}
        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
    </form>

</div>

    </section>
    <!-- /.content -->
  </div>


<!-- /.box -->
@endsection('content')