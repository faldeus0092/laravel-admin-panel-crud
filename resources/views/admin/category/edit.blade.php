@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    Edit Category <a href="{{ url('admin/category') }}" class="btn btn-danger btm-sm float-end text-white">Back</a>
                </h3>
                <p class="card-description">Please fill in the category details.</p>
                <form action="{{ url('admin/category/'.$category->id) }}" enctype="multipart/form-data" method="post" class="forms-sample">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}"/>
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $category->slug }}"/>
                            @error('slug')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Description</label>
                            <textarea name="description" row="3" class="form-control">{{ $category->description }}</textarea>
                            @error('description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control"/>
                            <img src="{{ asset('/uploads/category/'.$category->image) }}" width="200px" alt="">
                            @error('image')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Status</label><br/>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }} class="form-check-input">
                            @error('status')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        
                        <hr>
                        <h3 class="card-title">SEO Tags</h3>
                        
                        <div class="col-md-6 form-group">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}"/>
                            @error('meta_title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Meta Keyword</label>
                            <textarea name="meta_keyword" row="3" class="form-control">{{ $category->meta_keyword }}</textarea>
                            @error('meta_keyword')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Meta Description</label>
                            <textarea name="meta_description" row="3" class="form-control">{{ $category->meta_description }}</textarea>
                            @error('meta_description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn btn-primary float-end text-white">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection