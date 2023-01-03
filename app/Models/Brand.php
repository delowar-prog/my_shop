<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    private static $brand;
    use HasFactory;
    public static function addBrand($req){
        self::$brand=new Brand();
        self::$brand->brand_name=$req->brand_name;
        self::$brand->status=$req->status;
        self::$brand->save();
    }
    public static function updateBrand($req,$id){
        self::$brand=Brand::find($id);
        self::$brand->brand_name=$req->brand_name;
        self::$brand->status=$req->status;
        self::$brand->save();
    }
}
