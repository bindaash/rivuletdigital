@extends('layouts.app')
@section('content')
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
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <!-- <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tag"></i></span> -->
              <div class="info-box-content">
                <strong class="info-box-text">Total Posts : </strong>
                <span class="info-box-number">
                  {{ $posts->total() }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <div>
            <a href="{{ URL::to('posts') }}" class="btn btn-info btn-sm">View All</a>
            </div>
            <!-- /.info-box -->
          </div>
          
          <!-- /.col -->
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection