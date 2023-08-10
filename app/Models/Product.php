<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $product;
    public $image,$imageName,$uploadDirectory,$imageUrl,$moveImage;
    use HasFactory;
    public function saveProduct($request){
        $this->product=new Product();
        $this->product->cat_id=$request->cat_id;
        $this->product->brand_id=$request->brand_id;
        $this->product->product_name=$request->product_name;
        $this->product->product_code=$request->product_code;
        $this->product->product_details=$request->product_details;
        $this->product->product_image_one=$this->imageUrl($request,'product_image_one');
        $this->product->product_image_two=$this->imageUrl($request,'product_image_two');
        $this->product->product_image_three=$this->imageUrl($request,'product_image_three');
        $this->product->product_price=$request->product_price;
        $this->product->discount_price=$request->discount_price;
        $this->product->slider=$request->slider;
        $this->product->banner=$request->banner;
        $this->product->featured=$request->featured;
        $this->product->new=$request->new;
        $this->product->save();
    }
    public function imageUrl($request,$img){
        if($request->file($img)!=null) {
            $this->image = $request->file($img);
            $this->imageName = rand() . '.' . $this->image->getClientOriginalExtension();
            $this->uploadDirectory = 'backend/assets/upload/';
            $this->imageUrl = $this->uploadDirectory . $this->imageName;
            $this->moveImage = $this->image->move($this->uploadDirectory, $this->imageName);
            return $this->imageUrl;
        }
    }
    public function updateProduct($request){
        $this->product=Product::find($request->pro_id);
        $this->product->cat_id=$request->cat_id;
        $this->product->brand_id=$request->brand_id;
        $this->product->product_name=$request->product_name;
        $this->product->product_code=$request->product_code;
        $this->product->product_details=$request->product_details;
        if($request->file('product_image_one')){
            if($this->product->product_image_one!=null){
                unlink($this->product->product_image_one);
        }
            $this->product->product_image_one = $this->imageUrl($request, 'product_image_one');
        }
        if($request->file('product_image_two')){
            if($this->product->product_image_two!=null){
                unlink($this->product->product_image_two);
            }
        $this->product->product_image_two = $this->imageUrl($request, 'product_image_two');
        }
        if($request->file('product_image_three')){
            if($this->product->product_image_three!=null){
                unlink($this->product->product_image_three);
            }
        $this->product->product_image_three = $this->imageUrl($request, 'product_image_three');
        }
        $this->product->product_price=$request->product_price;
        $this->product->discount_price=$request->discount_price;
        $this->product->slider=$request->slider;
        $this->product->banner=$request->banner;
        $this->product->featured=$request->featured;
        $this->product->new=$request->new;
        $this->product->save();
    }
}
