<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Cart;
use Toastr;
use Auth;
class OrderController extends Controller
{
    public function index()
    {
        $allCartData=Cart::content();
        $subTotal=Cart::subtotal();
        $tax=Cart::tax();//with vat &
        $total=Cart::total();
        return view('front_pages.order', compact('allCartData','subTotal','tax','total'));
    }
public function orderProduct(Request $request){
//        Order::saveOrderData($request);
        $allCartData=Cart::content();
        foreach ($allCartData as $data){
            $pro_id=$data->rowId;
            $pro_name=$data->name;
            $pro_image=$data->options->image;
            $pro_qty=$data->qty;
            $subtotal=$data->subtotal;
            $total=$data->total;
        }
        $user_id=Auth::user()->id; //login user id
        $user_email=Auth::user()->email;
        $order=new Order();
        $order->pro_id=$pro_id;
        $order->user_id=$user_id;
        $order->customer_name=$request->customer_name;
        $order->customer_address=$request->customer_address;
        $order->customer_phone=$request->customer_phone;
        $order->customer_email=$user_email;
        $order->customer_city=$request->customer_city;
        $order->pro_name=$pro_name;
        $order->pro_image=$pro_image;
        $order->pro_qty=$pro_qty;
        $order->subtotal=$subtotal;
        $order->total=$total;
        $order->save();
        Cart::destroy();
        Toastr::success('Order Successfully', 'Success');
        return redirect()->route('dashboard');
    }
}
