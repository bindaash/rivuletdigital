@extends('posts.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit {{ $post->category_name }}</h2>
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
  
    <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category Name:</strong>
                    <input type="text" name="category_name" value="{{ $post->category_name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                    <label for="exampleInputFile">Image</label><br/>
                    @if($post->image!='')
                    <img width="100" height="100" alt="{{ $post->image }}" src="{{ asset('public/storage/posts').'/'.$post->image }}" />
                    <br/>
                    @endif
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                        <div class="custom-control custom-radio">
                          <input {{ $post->status == 'active' ? 'checked' : '' }} name="status" value="active" class="custom-control-input" type="radio" id="customRadio1" >
                          <label for="customRadio1" class="custom-control-label">Active</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input {{ $post->status == 'inactive' ? 'checked' : '' }} name="status" value="inactive" class="custom-control-input" type="radio" id="customRadio2">
                          <label for="customRadio2" class="custom-control-label">Inactive</label>
                        </div>
                  </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection