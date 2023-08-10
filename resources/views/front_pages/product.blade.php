@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="section group">
            <div class="cont-desc span_1_of_2">
                <div class="category-product">
                    <h2 style="margin-bottom:10px">All Products</h2> <hr>
                    @foreach($products as $product)
                        <div class="grid_1_of_4 images_1_of_4">
                            <a href="{{route('product.preview', ['id'=>$product->id])}}"><img src="{{asset($product->product_image_two)}}" alt=""/></a>
                            <h3 style="color: darkred;text-transform: uppercase;margin: 10px 0;">{{substr($product->product_name,0,15)}}</h3>
                            <p><span class="price">{{$product->product_price}}</span></p>
                            <div class="button"><span><a href="{{route('product.preview', ['id'=>$product->id])}}" class="details">Details</a></span></div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="rightsidebar span_3_of_1">
                <h2>CATEGORIES</h2>
                <ul>
                    @foreach($allCategories as $category)
                        <li><a href="{{route('category.product',['cat_id'=>$category->id])}}">{{$category->category_name}}</a>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>

@endsection

