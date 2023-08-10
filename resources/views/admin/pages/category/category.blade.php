@extends('admin.layouts.master')
@section('page_name','Add Category')
@section('content')
    <div class="container-fluid px-4">

        <div class="row">
            <div class="col-md-6 offset-3">
                <a href="{{route('manage.category')}}" class="btn btn-dark btn-sm">Manage Category</a>
                <div class="card mb-4 mt-5">

                    <div class="card-header">
                        <h5 class="card-title">Add Category</h5>
                    </div>
                    <div class="card-body mt-3">
                        <form action="{{route('store.category')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="category_name" id="category" placeholder="Type Category Name">
                            </div>
                            <div class="mb-3">
                                <select name="status" id="status" class="form-control">
                                    <option selected>Select Status</option>
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
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
