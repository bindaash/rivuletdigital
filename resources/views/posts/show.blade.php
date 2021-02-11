@extends('posts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category Name : </strong>
                {{ $post->category_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image : </strong>
                {{ $post->image }}
                @if($post->image!='')
                    <img width="100" height="100" alt="{{ $post->image }}" src="{{ asset('public/storage/posts').'/'.$post->image }}" />
                    <br/>
                @endif
            </div>
        </div>
        <div class="form-group">
        
            <div class="custom-control custom-radio">
                <strong>Status : </strong>
                <input {{ $post->status == 'active' ? 'checked' : '' }} name="status" value="active" class="custom-control-input" type="radio" id="customRadio1" >
                <label for="customRadio1" class="custom-control-label">Active</label>
                <input {{ $post->status == 'inactive' ? 'checked' : '' }} name="status" value="inactive" class="custom-control-input" type="radio" id="customRadio2">
                <label for="customRadio2" class="custom-control-label">Inactive</label>
            </div>
        </div>
    </div>
@endsection