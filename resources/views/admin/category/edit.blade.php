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
    </div>
    @endif
    <form action="{{ url('admin/update/'.$category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="">Category Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" rows="6" class="form-control">{{ $category->description }}</textarea>
        </div>
        <h6>Status Mode</h6>
        <div class="row">
            <div class="col-md-3 mb-3">
            <label>Navbar Status</label>
            <input type="checkbox" name="navbar_status" {{ $category->navbar_status == '1' ? 'checked':'' }}/>
        </div>
        <div class="col-md-3 mb-3">
            <label>Status</label>
            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked':''}}/>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Update Category</button>
        </div>
    </form>
</div>
    </div>
</div>
@endsection