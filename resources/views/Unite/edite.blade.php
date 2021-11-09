@extends('layouts.main')
@section('Content')
<div class="container">
   <div class="container-fluid">
        <div class="card shadow mb-4">
             <div class="card-body">
             @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form method="POST" action="{{ URL::to('/unite') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Unite Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" placeholder="Enter Unite Name">
                </div>
                @error('name')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror
                <div class="form-group">
                    <label for="name">Choose Type</label>
                    <select id="name" name="type" class="form-control">
                        <option value="1">Small Unite</option>
                        <option value="2">Big Unite</option>
                    </select>
                </div>
                
                <input type="submit" class="btn btn-primary">
            </form>
            </div>
        </div>
    </div>
</div>

@endsection