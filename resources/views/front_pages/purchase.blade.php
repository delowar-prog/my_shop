@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="section group">
            <div class="col span_2_of_3">
                <div class="support">
                    <div class="clear"></div>
                        <h4 class="mt-5 text-white font-sans p-2 mb-3 bg-success">PURCHASES HISTORY</h4>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Product Id</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Purchase Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        @foreach($purchases as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{substr($item->pro_id,0,8)}}</td>
                            <td>{{$item->pro_name}}</td>
                            <td><img src="{{asset($item->pro_image)}}" width="40" class="img-fluid" alt=""></td>
                            <td>{{$item->pro_qty}}</td>
                            <td>{{$item->total}}</td>
                            <td>{{date('M j,y',strtotime($item->created_at))}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('layouts.inc.dashboard_sidebar')
        </div>
    </div>
@endsection

