<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Toastr;
class BrandController extends Controller
{
    private $brand;
    public function add_brand(){
        return view('admin.pages.brand.add_brand');
    }
    public function store(Request $request){
        Brand::addBrand($request);
        Toastr::success('Brand Added Successfully', 'success');
        return back();
    }
    public function manage_brand(){
        return view('admin.pages.brand.manage_brand',[
            'brands'=>Brand::all()
        ]);
    }
    public function delete_brand(Request $request){
        Brand::find($request->brand_id)->delete();
        Toastr::success('Brand Deleted Successfully', 'success');
        return redirect(route('manage.brand'));
    }
    public function edit($id){
        return view('admin.pages.brand.edit',[
            'brand'=>Brand::find($id)
        ]);
    }
    public function update(Request $request){
        Brand::updateBrand($request,$request->brand_id);
        Toastr::success('Brand Updated Successfully', 'success');
        return redirect(route('manage.brand'));
    }
}
