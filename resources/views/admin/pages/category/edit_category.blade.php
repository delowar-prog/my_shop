@extends('admin.layouts.master')
@section('page_name','Edit Category')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6 offset-3">
                <a href="{{route('manage.category')}}" class="btn btn-dark btn-sm">Manage Category</a>
                <div class="card mb-4 mt-5">
                    <div class="card-header">
                        <h5 class="card-title">Update Category</h5>
                    </div>
                    <div class="card-body mt-3">
                        <form action="{{route('update.category')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$category->id}}" name="cat_id">
                            <div class="mb-3">
                                <input type="text" value="{{$category->category_name}}" class="form-control" name="category_name" id="category">
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary btn-sm" value="Add Category">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

