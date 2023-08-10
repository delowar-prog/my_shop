@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="support">
            <div class="support_desc">
                <h3>Order Form</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <div class="col span_2_of_3_order_page">
                <div class="contact-form">
                    <h2 style="margin-bottom: 30px">Please fillup the form Currectly</h2>
                    <form action="{{route('order.product')}}" method="post">
                        @csrf
                        <div>
                            <span><label>NAME (Who Received Product)</label></span>
                            <span><input type="text" name="customer_name"></span>
                        </div>
                        <div>
                            <span><label>SHIPPING ADDRESS</label></span>
                            <span><textarea name="customer_address" required> </textarea></span>
                        </div>
                        <div>
                            <span><label>MOBILE NO</label></span>
                            <span><input type="text" name="customer_phone" required></span>
                        </div>
                        <div>
                            <span><label>CITY</label></span>
                            <span><input type="text" name="customer_city"></span>
                        </div>
                        <div>
                            <span><input type="submit" value="SUBMIT"></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col span_1_of_3_order_page">
                <div class="company_address">
                    <h2>Product Information :</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pro_id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product_name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1; @endphp
                        @foreach($allCartData as $data)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{substr($data->rowId,0,8)}}</td>
                            <td><img src="{{asset($data->options->image)}}" width="40" alt=""></td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->qty}}</td>
                            <td>{{$data->price}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <table style="float:right;text-align:left;" width="48%">
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
                            <td>TK. {{$total}} </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

