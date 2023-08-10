<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Auth;
class FrontEndController extends Controller
{
    //For Guest User
    public function home(){
        $products= Product::where('banner','=',1)->get();
        $sliders= Product::where('slider','=',1)->get();
        $featured= Product::where('featured','=',1)->get();
        $new= Product::where('new','=',1)->get();
        return view('front_pages.index', compact('products','sliders','featured','new'));
    }
    public function products(){
        $allCategories=Category::all();
            return view('front_pages.product',[
                'products'=>Product::all()->take(8),
                'allCategories'=>$allCategories,
            ]);
    }
    public function view_product($id){
        $productById= Product::find($id);
        return view('front_pages.preview', compact('productById'));
    }

    //For Authenticate User
    public function index(){
        return view('front_pages.dashboard');
    }
    public function purchase(){
        $user_id=Auth::user()->id;
       $purchases= Order::where('user_id',$user_id)->get();
//        $purchases=DB::table('products')->join('categories', 'products.cat_id','=','categories.id')
//            ->join('brands', 'products.brand_id','=','brands.id')
//            ->select('products.*','brands.brand_name','categories.category_name')
//            ->where('products.id',$id)->first();
        return view('front_pages.purchase', compact('purchases'));
    }
    public function preview($id){
        $allCategories=Category::all();
        $value=DB::table('products')->join('categories', 'products.cat_id','=','categories.id')
            ->join('brands', 'products.brand_id','=','brands.id')
            ->select('products.*','brands.brand_name','categories.category_name')
            ->where('products.id',$id)->first();
        $cat_id=$value->cat_id;
        $related_products=Product::where('cat_id',$cat_id)->get();
        return view('front_pages.preview', compact('value','related_products','allCategories'));
    }
    public function productByCategory($cat_id){
        $allCategories=Category::all();
        $productsByCat=DB::table('products')->join('categories', 'products.cat_id','=','categories.id')
            ->join('brands', 'products.brand_id','=','brands.id')
            ->select('products.*','brands.brand_name','categories.category_name')
            ->where('products.cat_id',$cat_id)->get();
        $category=Category::find($cat_id);
        return view('front_pages.productbycat', compact('productsByCat','allCategories','category'));
    }
    public function contact(){
        return view('front_pages.contact');
    }

}
