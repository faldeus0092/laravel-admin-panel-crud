@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    Add Product <a href="{{ url('admin/products') }}" class="btn btn-danger btm-sm float-end text-white">Back</a>
                </h3>
                <p class="card-description">Please fill in the products details.</p>
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
                    
                @endif
                <form action="{{url('admin/products')}}" method="post" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <ul class="nav nav-tabs  px-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation" >
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag" type="button" role="tab" aria-controls="seotag" aria-selected="false">
                                SEO Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">
                                Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">
                                Product Images
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="form-group">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category_id">
                                    <option selected value="">Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Product Slug</label>
                                <input type="text" name="slug" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label"">Select Brand</label>
                                <select class="form-select" name="brand" class="form-control">
                                    <option selected>Select brand</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->name}}"> {{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Small Description (500 Words)</label>
                                <textarea name="small_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="seotag" role="tabpanel" aria-labelledby="seotag-tab">
                            <div class="form-group">
                                <label class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Meta Keywords</label>
                                <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Original Price</label>
                                        <input type="text" name="original_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" name="quantity" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Trending</label>
                                        <input type="checkbox" name="trending" class="form-check-input">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <input type="checkbox" name="status" class="form-check-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="image" role="tabpanel" aria-labelledby="image-tab">
                            <div class="mt-3">
                                <div class="form-group">
                                    <label class="form-label">Upload Product Images</label>
                                    <input type="file" name="image[]"  multiple class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary text-white">Add Product</button>
                    </div>
                </form>          
            </div>
        </div>
    </div>
</div>

@endsection
