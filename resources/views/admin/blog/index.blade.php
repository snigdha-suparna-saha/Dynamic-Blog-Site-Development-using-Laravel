@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-gradient-primary text-center text-white py-3 "> Add Blog Form</div>
                <div class="card-body">
                    <h5 class="text-center text-success">{{session('message')}}</h5>
                    <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-3">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id">
                                    <option value=""> --- Select Category ---</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Blog Title</label>
                            <div class="col-md-9">
                                <textarea type="text" name="title" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Blog Description</label>
                            <div class="col-md-9">
                                <textarea type="text" name="description" class="summernote"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Blog Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="form-control-file"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Publication Status</label>
                            <div class="col-md-9">
                                <label><input type="radio" name="status" value="1" checked/> Published</label>
                                <label><input type="radio" name="status" value="0"/> Unpublished</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="Create New Blog"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
