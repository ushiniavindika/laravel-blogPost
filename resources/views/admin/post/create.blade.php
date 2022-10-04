@extends('layouts.master')
@section('title','Add Post')
@section('content')


<div class="container-fluid px-4">
    <div class="card mt-4">

        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errorrs->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
            
        </div>
        @endif
        <div class="card-header">
            <h4>Add Posts<a href="{{ url('admin/add-post') }}" class="btn btn-primary btn-sm float-end">Add Post</a>
            </h4>
        </div>
        <div class="card-body">
       
            <form action="{{ url('admin/add-post') }}" method="POST" enctype="multipart/form-data">
                @csrf
        
                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach ($category as $cateitem)
                        <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Title</label>
                    <input type="text" name="title" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control"/>
                </div>

                <h4>Status</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status"/>
                        </div>
                    </div>
                        <div class="mb-8">
                            <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save Post</button>
                        </div>
                        </div>
                </div>

            </form>
          
        </div>
    </div>

</div>
@endsection