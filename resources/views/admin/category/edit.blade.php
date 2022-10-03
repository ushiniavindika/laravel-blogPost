@extends('layouts.master')
@section('title','Category')
@section('content')


<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit category</h4>
</div>
<div class="card-body">

    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errorrs->all() as $error)
        <div>{{ $error }}</div>

            
        @endforeach
        
    @endif
    <form action="{{ url('admin/update/'.$category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="">Category Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Update Category</button>
        </div>
    </form>
</div>
    </div>
</div>
@endsection