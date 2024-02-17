@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col">


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">All Blog Info</h5>
                </div>
                <div class="card-body">
                    <h5 class="text-center text-success">{{session('message')}}</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Blog title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>{{$blog->category->name}}</td>
                                    <td><img src="{{asset($blog->image)}}" alt="" width="70px" height="50px"></td>
                                    <td>{{$blog->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('blog.edit', ['id' => $blog->id])}}" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('blog.delete', ['id' => $blog->id])}}" onclick="return confirm('Are you sure to delete this...')" class="btn btn-danger btn-sm">
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

