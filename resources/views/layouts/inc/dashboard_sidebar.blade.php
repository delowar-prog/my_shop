<div class="col span_1_of_3">
    <img src="{{asset('frontend')}}/images/contact.png" alt="" />
    <div class="company_address">
        <h6 class="mt-3 text-white">User Id : {{Auth::user()->id}}</h6>
        <h6 style="color:white;">User Name : {{Auth::user()->name}}</h6>
    </div>
    <div class="company_address mt-5">
        <h2 style="color:white;">Your Links :</h2>
        <ul class="profile_menu">
            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li><a href="{{route('purchase.history')}}">Purchase History</a></li>
            <li><a href="">Password Change</a></li>
            <li><a href="">My Cart</a></li>
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
        </ul>
    </div>
</div>
