@extends('admin.layouts.master')
@section('page_name','Manage Category')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Category List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Category Name</th>
                            <th>Stutus</th>
                            <th width="15">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->category_name}}</td>
                            @if($value->status==0)
                                <td>Disabled</td>
                            @else
                                <td>Enabled</td>
                            @endif
                            <td><div class="action-button"><a href="{{route('edit.category',['id'=>$value->id])}}" class="btn-info btn-sm btn"> Edit</a>
                                <form action="{{route('delete.category')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="cat_id" value="{{$value->id}}">
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                                </div>
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

