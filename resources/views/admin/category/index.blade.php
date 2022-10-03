@extends('layouts.master')
@section('title','Category')
@section('content')


<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Category<a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add Category</a>
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
                    <th>Category Name</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item )
                    
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name}}</td>
                    <td>
                        <a href="{{ url('admin/edit/'.$item->id) }}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    </div>
</div>
@endsection