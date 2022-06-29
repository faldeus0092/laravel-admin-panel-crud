@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    Add Category <a href="{{ url('admin/category') }}" class="btn btn-danger btm-sm float-end text-white">Back</a>
                </h3>
                <p class="card-description">Please fill in the category details.</p>
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif
                <form action="{{ url('admin/category') }}" enctype="multipart/form-data" method="post" class="forms-sample">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control"/>
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control"/>
                            @error('slug')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="form-label">Description</label>
                            <textarea name="description" row="3" class="form-control"></textarea>
                            @error('description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control"/>
                            @error('image')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label">Status</label><br/>
                            <input type="checkbox" name="status" class="form-check-input">
                            @error('status')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <hr>
                        <h3 class="card-title">SEO Tags</h3>
                        <div class="col-md-6 form-group">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control"/>
                            @error('meta_title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="form-label">Meta Keyword</label>
                            <textarea name="meta_keyword" row="3" class="form-control"></textarea>
                            @error('meta_keyword')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="form-label">Meta Description</label>
                            <textarea name="meta_description" row="3" class="form-control"></textarea>
                            @error('meta_description')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn btn-primary float-end text-white">Save Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection