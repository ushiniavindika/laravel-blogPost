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
            Your content
    </div>
</div>

    <!--<div class="card-body">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>  
        @endif -->

</div>
@endsection