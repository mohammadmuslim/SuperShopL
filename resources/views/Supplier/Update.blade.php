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
            <form method="POST" action="{{ URL::to('supplier/'.$data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Supplier Name</label>
                    <input type="text" class="form-control" id="name" name="supplier_name" value="{{$data->supplier_name}}">
                </div>
                @error('supplier_name')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror
                <div class="form-group">
                    <label for="name">Company Name</label>
                    <input type="text" class="form-control" id="name" name="company_name" value="{{$data->company_name}}">
                </div>
                @error('company_name')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" class="form-control" id="name" name="address" value="{{$data->address}}">
                </div>
                @error('address')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="number" class="form-control" id="name" name="phone" value="{{$data->phone}}">
                </div>
                @error('phone')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror
                
                <input type="submit" class="btn btn-primary">
            </form>
            </div>
        </div>
    </div>
</div>

@endsection