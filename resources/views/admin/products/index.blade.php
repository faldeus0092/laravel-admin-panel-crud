@extends('layouts.admin')

@section('content')

<div class="row">
    @if (session('message'))
        <div class="alert alert-success alert-dismissible">{{ session('message') }}</div>
    @endif
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    Products 
                </h3>
                <a href="{{ url('admin/products/create') }}" class="btn btn-sm btn-primary btm-sm float-end text-white">Add Product</a>
                <p class="card-description">
                    Manage products here
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>
                                        @if ($product->category)
                                            {{$product->category->name}}
                                        @else
                                            No Category
                                        @endif
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->selling_price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->status == '1' ? 'Hidden':'Visible'}}</td>
                                    <td>
                                        <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-success btn-sm text-white">Edit</a>
                                        <a href="{{url('admin/products/'.$product->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger btn-sm text-white">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">No Products Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
