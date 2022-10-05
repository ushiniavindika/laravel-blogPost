@extends('layouts.master')
@section('title','Edit Post')
@section('content')


<div class="container-fluid px-4">
    <div class="card mt-4">

            
        
        <div class="card-header">
            <h4>Edit Posts<a href="{{ url('admin/posts') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errorrs->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif
       
            <form action="{{ url('admin/update-post/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
        
                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id" required class="form-control">
                        <option value="">--Select Category--</option>
                        @foreach ($category as $cateitem)
                        <option value="{{ $cateitem->id }}" {{ $post->category_id == $cateitem->id ? 'selected':''}}>
                            {{ $cateitem->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Title</label>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $post->slug }}" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" rows="5">{!! $post->description !!}"</textarea>
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
                            <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked':'' }} />
                        </div>
                    </div>
                        <div class="mb-8">
                            <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update Post</button>
                        </div>
                        </div>
                </div>

            </form>
          
        </div>
    </div>

</div>
@endsection