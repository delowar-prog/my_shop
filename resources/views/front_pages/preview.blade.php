@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="section group">
{{--                <h3>{{session('message')}}</h3>--}}
            <div class="cont-desc span_1_of_2">
                <div class="grid images_3_of_2">
                    <img src="{{asset($value->product_image_two)}}" alt="" />
                </div>
                <div class="desc span_3_of_2">
                    <h2>{{$value->product_name}}</h2>
                    <p>{{$value->product_details}}</p>
                    <div class="price">
                        <p>Price: <span>${{$value->product_price}}</span></p>
                        <p>Category: <span>{{$value->category_name}}</span></p>
                        <p>Brand:<span>{{$value->brand_name}}</span></p>
                    </div>
                    <div class="add-cart">
                        <form action="{{route('add.toCart')}}" method="post">
                            @csrf
                            <input type="number" class="buyfield" name="quantity" value="1"/>
                            <input type="hidden" name="pro_id" value="{{$value->id}}">
                            <input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
                        </form>
                    </div>
                </div>
                <div class="product-desc">
                    <h2>Related Products</h2>
                        @foreach($related_products as $result)
                        <div class="grid_1_of_4 images_1_of_4">
                            <a href=""><img src="{{asset($result->product_image_two)}}" alt=""/></a>
                            <h3 style="color: darkred;text-transform: uppercase;margin: 10px 0;">{{substr($result->product_name,0,15)}}</h3>
                            <p><span class="price">{{$result->product_price}}</span></p>
                            <div class="button"><span><a href="{{route('product.preview', ['id'=>$result->id])}}" class="details">Details</a></span></div>
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

