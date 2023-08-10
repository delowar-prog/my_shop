<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add_category(){
        return view('admin.pages.category.category');
    }
    public function store(Request $req){
            $category=new Category();
            $category->category_name=$req->category_name;
            $category->status=$req->status;
            $category->save();
            return redirect(route('manage.category'));
    }
    public function manage_category(){
        $allcategories=Category::all();
        return view('admin.pages.category.manage_category',[
            'categories'=>$allcategories
        ]);
    }
    public function delete(Request $request){
        $category=Category::find($request->cat_id)->delete();
        return redirect(route('manage.category'));
    }
    public function edit($id){
        return view('admin.pages.category.edit_category',[
            'category'=>Category::find($id)
        ]);
    }
    public function update(Request $req){
        $categoryById=Category::find($req->cat_id);
        $categoryById->category_name=$req->category_name;
        $categoryById->save();
        return redirect(route('manage.category'));
    }
}
