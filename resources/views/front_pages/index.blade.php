@extends('layouts.master')
@section('slider')
@include('layouts.inc.header_bottom')
@endsection
@section('content')
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>Feature Products</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            @foreach($featured as $result)
            <div class="grid_1_of_4 images_1_of_4">
                <a href="{{route('product.preview', ['id'=>$result->id])}}"><img src="{{$result->product_image_two}}" alt=""/></a>
                <h2>{{$result->product_name}}</h2>
                <p>{{substr($result->product_details,0,50).'....'}}</p>
                <p><span class="price">{{$result->product_price}}</span></p>
                <div class="button"><span><a href="{{route('product.preview', ['id'=>$result->id])}}" class="details">Details</a></span></div>
            </div>
            @endforeach
        </div>

        </div>
        <div class="content_bottom">
            <div class="heading">
                <h3>New Products</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            @foreach($new as $result)
            <div class="grid_1_of_4 images_1_of_4">
                <a href="{{route('product.preview', ['id'=>$result->id])}}"><img src="{{$result->product_image_two}}" alt="" /></a>
                <h2 style="background: inherit; color:darkred;">{{$result->product_name}}</h2>
                <p><span class="price">{{$result->product_price}}</span></p>
                <div class="button"><span><a href="{{route('product.preview', ['id'=>$result->id])}}" class="details">Details</a></span></div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
