@extends('layouts.main')
@section('Content')
<div class="container col-sm-6">
    <form method="POST" action="brand" enctype="multipart/form-data">
         @csrf
        <div class="form-group">
            <label for="name">Brnad Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Brand Name">
        </div>
        @error('name')
            <strong class="text-danger"></strong> 
        @enderror
        <div class="form-group">
            <label for="image">Select Brnad Image</label>
            <input type="file" id="image" class="form-control" name="image">
        </div>
        @error('image')
            <strong class="text-danger"></strong> 
        @enderror
        <input type="submit" class="btn btn-primary">
    </form>
</div>
@endsection