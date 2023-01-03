@extends('admin.layouts.master')
@section('page_name','Add Product')
@section('content')
    <div class="container-fluid px-4">

        <div class="row">
            <div class="col-md-10 offset-1">
                <a href="{{route('manage.product')}}" class="btn btn-dark btn-sm">Manage Product</a>
                <div class="card mb-4 mt-5">

                    <div class="card-header">
                        <h5 class="card-title">Add Product</h5>
                    </div>
                    <div class="card-body mt-3">
                        <form action="{{route('store.product')}}" class="user" method="post" enctype="multipart/form-data">
                           @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Categroy Name</label>
                                    <select name="cat_id" class="form-control">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Brand Name</label>
                                    <select name="brand_id" class="form-control">
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" name="product_name">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Product Code</label>
                                    <input type="text" class="form-control" name="product_code">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label>Product Details</label>
                                <textarea class="form-control " rows="5" cols="10" name="product_details"></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Image One</label>
                                    <input type="file" class="form-control" name="product_image_one">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Image Two</label>
                                    <input type="file" class="form-control" name="product_image_two">
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label>Image Three</label>
                                    <input type="file" class="form-control" name="product_image_three">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Product Price</label>
                                    <input type="text" class="form-control" name="product_price">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Discount Price</label>
                                    <input type="text" class="form-control" name="discount_price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <input type="checkbox" name="slider" value="1"> As Slider
                                </div>
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <input type="checkbox" name="banner" value="1"> As Banner
                                </div>
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <input type="checkbox" name="featured" value="1"> As Featured
                                </div>
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <input type="checkbox" name="new" value="1"> As New
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-sm" value="Add Product">
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

