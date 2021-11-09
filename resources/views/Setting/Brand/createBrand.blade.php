@extends('layouts.main')
@section('Content')
<div class="container">
   <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="m-0 font-weight-bold  btn btn-success" href="brand">All Brand List</a>
            </div>
             <div class="card-body">
             @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form method="POST" action="brand" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Brnad Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Brand Name">
                </div>
                @error('name')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror
                <div class="form-group">
                    <label for="image">Select Brnad Image</label>
                    <input type="file" id="image" class="form-control" name="image">
                </div>
                @error('image')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror
                <input type="submit" class="btn btn-primary">
            </form>
            </div>
        </div>
    </div>
</div>

@endsection