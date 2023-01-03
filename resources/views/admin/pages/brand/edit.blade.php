@extends('admin.layouts.master')
@section('page_name','Edit Brand')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6 offset-3">
                <a href="{{route('manage.brand')}}" class="btn btn-dark btn-sm">Manage Brand</a>
                <div class="card mb-4 mt-5">
                    <div class="card-header">
                        <h5 class="card-title">Edit Brand</h5>
                    </div>
                    <div class="card-body mt-3">
                        <form action="{{route('update.brand')}}" method="post">
                            @csrf
                            <input type="hidden" name="brand_id" value="{{$brand->id}}">
                            <div class="mb-3">
                                <input type="text" class="form-control" value="{{$brand->brand_name}}" name="brand_name" id="brand_name" placeholder="Type Brand Name">
                            </div>
                            <div class="mb-3">
                                <select name="status" id="status" class="form-control">
                                    @if($brand->status==1)
                                    <option selected value="1">Enable</option>
                                    <option value="0">Disable</option>
                                    @else
                                    <option value="1">Enable</option>
                                    <option selected value="0">Disable</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary btn-sm" value="Add Brand">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

