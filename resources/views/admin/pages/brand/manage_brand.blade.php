@extends('admin.layouts.master')
@section('page_name','Manage Brand')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="mb-3">
            <a href="{{route('add.brand')}}" class="btn btn-primary btn-sm">Add Brand</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Brand List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Brand Name</th>
                            <th>Stutus</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->brand_name}}</td>
                            @if($brand->status==0)
                                <td>Disabled</td>
                                @else
                            <td>Enabled</td>
                            @endif
                            <td width="10"><a href="{{route('edit.brand',['id'=>$brand->id])}}" class="btn-info btn-sm btn"> Edit</a></td>
                            <td width="10">
                                <form action="{{route('delete.brand')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="brand_id" value="{{$brand->id}}">
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection


