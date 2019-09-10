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
        <h3 class="box-title">All Categories </h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created At</th>
        </tr>
        @foreach($categories as $category)            
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at }}</td>
            </tr>
        @endforeach
    </table>

</div>

    </section>
    <!-- /.content -->
  </div>


<!-- /.box -->
@endsection('content')