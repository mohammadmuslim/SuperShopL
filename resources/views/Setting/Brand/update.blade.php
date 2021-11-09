@extends('layouts.main')
@section('Content')
<div class="container col-sm-6">
        @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
    <form action="{{ URL::to('brand/'.$data->id) }}" method="POST">
    @csrf
    @method('PUT')
    
        <div class="form-group">
            <label for="name">Brnad Name</label>
            <input type="text" class="form-control" id="name" name="name" Value="{{$data->name}}">
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
@endsection

