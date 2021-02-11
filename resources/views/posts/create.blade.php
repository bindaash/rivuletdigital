@extends('posts.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Post</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
        </div>
    </div>
</div>
   
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
   
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Category Name:</strong>
                <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="image">Image</label>
            <div class="input-group">
                <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="image">
                <!-- <label class="custom-file-label" for="image">Choose file</label> -->
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="status">Status</label>
            <div class="custom-control custom-radio">
            <input name="status" value="active" class="custom-control-input" type="radio" id="customRadio1" checked>
            <label for="customRadio1" class="custom-control-label">Active</label>
            </div>
            <div class="custom-control custom-radio">
            <input name="status" value="inactive" class="custom-control-input" type="radio" id="customRadio2">
            <label for="customRadio2" class="custom-control-label">Inactive</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection