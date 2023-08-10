@extends('layouts.master')
@section('content')
        <div class="content">
            <div class="cartoption">
                <div class="cartpage">
                    <h2>Your Cart</h2>
                    <table class="tblone">
                        <tr>
                            <th width="20%">Product Name</th>
                            <th width="10%">Image</th>
                            <th width="15%">Price</th>
                            <th width="25%">Quantity</th>
                            <th width="20%">Total Price</th>
                            <th width="10%">Action</th>
                        </tr>
                        @foreach($allCartData as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td><img src="{{asset($data->options->image)}}" alt="Pro_image"/></td>
                            <td>Tk. {{$data->price}}</td>
                            <td>
                                <form action="{{route('edit.qty')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="row_id" value="{{$data->rowId}}">
                                    <input type="number" name="quantity" value="{{$data->qty}}"/>
                                    <input type="submit" name="submit" value="Update"/>
                                </form>
                            </td>
                            <td>Tk. {{$data->subtotal()}}</td>
                            <td>
                                <a href="" onclick="event.preventDefault(); document.getElementById('removeItem').submit()">X</a>
                                <form action="{{route('remove.cartItem')}}" method="post" id="removeItem">
                                    @csrf
                                    <input type="hidden" name="rowId" value="{{$data->rowId}}">
                                </form>
                            </td>
                        </tr>
                        @endforeach


                    </table>
                    <table style="float:right;text-align:left;" width="40%">
                        <tr>
                            <th>Sub Total : </th>
                            <td>TK. {{$subTotal}}</td>
                        </tr>
                        <tr>
                            <th>Tax : </th>
                            <td>TK. {{$tax}}</td>
                        </tr>
                        <tr>
                            <th>Grand Total :</th>
                            <td>TK. {{$total}}</td>
                        </tr>
                    </table>
                    </p>
                </div>
                <div class="shopping">
                    <div class="shopleft">
                        <a href="{{url('/')}}"> <img src="{{asset('frontend')}}/images/shop.png" alt="" /></a>
                    </div>
                    <div class="shopright">
                        @if(Auth::check())
                            <a href="{{route('order')}}"> <img src="{{asset('frontend')}}/images/check.png" alt="" /></a>
                        @else
                            <a href="{{route('login')}}"> <img src="{{asset('frontend')}}/images/check.png" alt="" /></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>

@endsection
