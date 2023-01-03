<div class="header_top">
    <div class="logo">
        <a href="index.html"><img src="{{asset('frontend')}}/images/logo.png" alt="" /></a>
    </div>
    <div class="header_top_right">
        <div class="search_box">
            <form>
                <input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
            </form>
        </div>
        <div class="shopping_cart">
            <div class="cart">
                <a href="{{route('check.cart')}}" title="View my shopping cart" rel="nofollow">
                    <span class="cart_title">Cart</span>
                    @if($cartQty!=null)
                    <span class="no_product">{{$cartQty}}/</span>
                    <span class="no_product">{{$cartTotal}}/=</span>
                    @else
                        <span class="no_product">(Empty)</span>
                    @endif

                </a>
            </div>
        </div>
        {{--            <div class="login">--}}

        {{--            </div>--}}
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="menu">
    <ul id="dc_mega-menu-orange" class="dc_mm-orange">
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('products')}}">Products</a> </li>
{{--        <li><a href="topbrands.html">Top Brands</a></li>--}}
        <li><a href="{{route('check.cart')}}">Cart</a></li>
        <li><a href="{{route('contact')}}">Contact</a> </li>
            @if(Route::has('login'))
                @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                               Logout
                            </a>
                        </form>
                    </li>
                   <li> <a href="{{route('dashboard')}}" style="color:#24ACF2;"><img src="{{asset('frontend/images/1.jpg')}}" style="border-radius: 50%; margin-right: 3px" alt="" width="30px">{{Auth::user()->name}}</a></li>
                @else
                <li><a href="{{ route('login') }}">Log in</a></li>

            @if(Route::has('register'))
            <li> <a href="{{ route('register') }}">Register</a></li>
            @endif
            @endauth
            @endif
        <div class="clear"></div>
    </ul>
</div>
