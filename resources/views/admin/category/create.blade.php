@extends('layouts.master')
@section('title','Category')
@section('content')


<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add category</h4>
</div>
<div class="card-body">

    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errorrs->all() as $error)
        <div>{{ $error }}</div>

            
        @endforeach
        
    @endif
    <form action="{{ url('admin/add-category') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="">Category Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" rows="6" class="form-control"></textarea>
        </div>
        <h6>Status Mode</h6>
        <div class="row">
            <div class="col-md-3 mb-3">
            <label>Navbar Status</label>
            <input type="checkbox" name="navbar_status"/>
        </div>
        <div class="col-md-3 mb-3">
            <label>Status</label>
            <input type="checkbox" name="status"/>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Save Category</button>
        </div>
        </div>
    </form>
</div>
    </div>
</div>
@endsection