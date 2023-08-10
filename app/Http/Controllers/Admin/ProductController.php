<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    public $product,$image;
    public function add_product(){
       return view('admin.pages.product.add_product',[
          'categories'=>Category::all(),'brands'=>Brand::all()
       ]);
    }
    public function store(Request $request){
       $this->product=new Product();
       $this->product->saveProduct($request);
       return redirect(route('manage.product'))->with('message','Product Inserted successfully..');;
    }

    public function manage_product(){
        $getProducts=DB::table('products')
            ->join('categories','products.cat_id','=','categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('products.*','categories.category_name','brands.brand_name')
            ->get();
       return view('admin.pages.product.manage_product',[
           'products'=>$getProducts
       ]);
    }
    public function delete_product(Request $request){
        $deleteProduct=Product::find($request->product_id);
        $delete=$deleteProduct->delete();
        if($delete){
            unlink($deleteProduct->product_image_one);
            unlink($deleteProduct->product_image_two);
            unlink($deleteProduct->product_image_three);
        }
        return redirect(route('manage.product'))->with('message','Product deleted successfully..');
    }

    public function edit_product($id){
        $productById=DB::table('products')->join('categories','categories.id','=','products.cat_id')
            ->join('brands','brands.id','=','products.brand_id')
            ->select('products.*','categories.category_name','brands.brand_name')->where('products.id','=',$id)->first();
        return view('admin.pages.product.edit_product',[
            'product'=>$productById, 'categories'=>Category::all(), 'brands'=>Brand::all()
        ]);
    }

    public function update(Request $request){
        $this->product=new Product();
        $this->product->updateProduct($request);
//       $productById=Product::find($request->pro_id);
        return redirect(route('manage.product'))->with('message','Product Updated successfully..');

    }

}
