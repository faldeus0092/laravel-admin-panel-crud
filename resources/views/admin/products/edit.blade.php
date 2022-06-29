@extends('layouts.admin')

@section('content')

<div class="row">
    @if (session('message'))
        <div class="alert alert-success alert-dismissible">{{ session('message') }}</div>
    @endif
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    Edit Product <a href="{{ url('admin/products') }}" class="btn btn-danger btm-sm float-end text-white">Back</a>
                </h3>
                <p class="card-description">Please fill in the products details.</p>
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
                    
                @endif
                <form action="{{url('admin/products/'.$product->id)}}" method="post" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    @method('put')
                    <ul class="nav nav-tabs px-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button @if (session('message'))
                                class="nav-link"
                            @else
                                class="nav-link active"
                            @endif   id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
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
                            <button @if (session('message'))
                            class="nav-link active"
                        @else
                            class="nav-link"
                        @endif id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">
                                Product Images
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div @if (session('message'))
                                class="tab-pane fade border p-3 show"
                            @else
                                class="tab-pane fade border p-3 show active"
                            @endif  id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="form-group">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category_id">
                                    <option value="">Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{ $category->id == $product->category_id ? "selected" : '' }}>
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Product Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label"">Select Brand</label>
                                <select class="form-select" name="brand" class="form-control">
                                    <option value="">Select brand</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->name}}"  {{ $brand->name == $product->brand ? "selected" : '' }}> {{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Small Description (500 Words)</label>
                                <textarea name="small_description" class="form-control" rows="4">{{$product->small_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="seotag" role="tabpanel" aria-labelledby="seotag-tab" >
                            <div class="form-group">
                                <label class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{$product->meta_title}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4">{{$product->meta_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Meta Keywords</label>
                                <textarea name="meta_keyword" class="form-control" rows="4">{{$product->meta_keyword}}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Original Price</label>
                                        <input type="text" name="original_price" class="form-control"  value="{{$product->original_price}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control"  value="{{$product->selling_price}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" name="quantity" class="form-control"  value="{{$product->quantity}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Trending</label>
                                        <input type="checkbox" name="trending" style="width: 30px; height: 30px;" {{ $product->trending == '1' ? 'checked' : '' }} class="form-check-input">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <input type="checkbox" name="status" style="width: 30px; height: 30px;" {{$product->status == '1' ? 'checked' : '' }} class="form-check-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div @if (session('message'))
                                class="tab-pane fade border p-3 show active"
                            @else
                                class="tab-pane fade border p-3 show"
                            @endif id="image" role="tabpanel" aria-labelledby="image-tab">
                            <div class="mt-3">
                                <div class="form-group">
                                    <label class="form-label">Upload Product Images</label>
                                    <input type="file" name="image[]"  multiple class="form-control">
                                </div>
                                <div>
                                    @if ($product->productImages)
                                    <div class="row">
                                        @foreach ($product->productImages as $image)
                                            <div class="col-md-2">
                                                <div class="container" style="height: 60px;
                                                width: 60px;
                                                float: center;
                                                overflow: hidden;
                                                display: flex;
                                                justify-content: center;
                                                margin: 2px;"><img src="{{ asset($image->image) }}" style="height:60px;" alt="Img" class="me-4 border"/></div>
                                                <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block float-center">Remove</a>
                                            </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <h5>No Image</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary text-white">Update</button>
                    </div>
                </form>          
            </div>
        </div>
    </div>
</div>

@endsection
