<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group banner_life_items">
            @foreach($products as $product)
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="{{route('product.preview', ['id'=>$product->id])}}"> <img src="{{$product->product_image_two}}" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>{{$product->product_name}}</h2>
                    <p>{{$product->product_details}}</p>
                    <div class="button"><span><a href="{{route('product.preview', ['id'=>$product->id])}}">Add to cart</a></span></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    @foreach($sliders as $slider)
                    <li><img src="{{$slider->product_image_one}}" alt=""/>
                    @endforeach
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>
