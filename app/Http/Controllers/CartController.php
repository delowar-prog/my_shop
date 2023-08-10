<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Toastr;
use function Symfony\Component\HttpFoundation\Session\Storage\Handler\convertStringToInt;

class CartController extends Controller
{
    public function store(Request $request){
        $quantity=$request->quantity;
        $product=Product::find($request->pro_id);
        $data=array();
        $data['id']=$product->id;
        $data['name']=$product->product_name;
        $data['qty']=$quantity;
        $data['price']=$product->product_price;
        $data['weight']=0;
        $data['options']['image']=$product->product_image_two;
        Cart::add($data);
        Toastr::success('Successfully added', 'success');
        return back();
    }
    public function checkCart(){
        $allCartData=Cart::content();
        $subTotal=Cart::subtotal();
        $tax=Cart::tax();//with vat &
        $total=Cart::total();
        return view('front_pages.cart', compact('allCartData','subTotal','tax','total'));
    }
    public function editCartQty(Request $request){
        $rowId=$request->row_id;
        $update=Cart::update($rowId, $request->quantity);
        if($update){
            Toastr::success('Cart Updated', 'Success');
        }else{
            Toastr::error('Something Wrong', 'Erroer');
        }

        return back();
    }
    public function removeItem(Request $request){
        $rowId=$request->rowId;
        Cart::remove($rowId);
        return back();
    }

}
