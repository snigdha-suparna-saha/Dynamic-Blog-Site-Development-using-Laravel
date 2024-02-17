@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Category Tables</h1>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Category Example</h6>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center text-success">{{session('message')}}</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td><img src="{{asset($category->image)}}" alt="" width="70px" height="50px"></td>
                                        <td>{{$category->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                        <td>
                                            <a href="{{route('category.edit', ['id'=> $category->id])}}" class="btn btn-success btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('category.delete', ['id' => $category->id])}}" onclick="return confirm('Are you sure to delete this...')" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

