@extends('admin.layouts.master')
@section('page_name','Manage Category')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Category List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h5 class="text-danger">{{session('message')}}</h5>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Product_name</th>
                            <th>Product_code</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th width="10">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->category_name}}</td>
                            <td>{{$product->brand_name}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_code}}</td>
                            <td><img src="{{asset($product->product_image_one)}}" width="80" class="img-fluid" alt=""></td>
                            <td>{{$product->product_price}}</td>
                            <td><div class="action-button"><a href="{{route('edit.product',['pro_id'=>$product->id])}}" class="btn-info btn-sm btn"> Edit</a>
                                    <form action="{{route('delete.product')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection


