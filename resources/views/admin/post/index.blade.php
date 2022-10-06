@extends('layouts.master')
@section('title','Category')
@section('content')


<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Posts<a href="{{ url('admin/add-post') }}" class="btn btn-primary btn-sm float-end">Add Post</a>
            </h4>
        </div>
        <div class="card-body">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>  
        @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Post Name</th>
                <th>Post Image</th>
                <th>State</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)

            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    <img src="{{asset('uploads/category/'.$item->image)}}" width="50px" height="50px"alt="Img">
                    </td>
                <td>{{ $item->status == '1'? 'Hidden':'Visible' }}</td>
                <td>
                    <a href="{{url('admin/post/'.$item->id)}}" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <a href="{{url('admin/delete-post/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>
            </tr>
            @endforeach
        </tbody>
        
        

    </table>
    </div>
</div>

</div>
@endsection