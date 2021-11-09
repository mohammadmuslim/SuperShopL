@extends('layouts.main')
@section('Content')
<div class="container">
   <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="m-0 font-weight-bold  btn btn-success" href="supplier">All Supplier List</a>
            </div>
             <div class="card-body">
             @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('fails'))
                <div class="alert alert-danger">
                    {{ session()->get('fails') }}
                </div>
            @endif
            <form method="POST" action="/supplier" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Supplier Name</label>
                    <input type="text" class="form-control" id="name" name="supplier_name" placeholder="Enter Supplier Name">
                </div>
                @error('supplier_name')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror
                <div class="form-group">
                    <label for="name">Company Name</label>
                    <input type="text" class="form-control" id="name" name="company_name" placeholder="Enter Company Name">
                </div>
                @error('company_name')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" class="form-control" id="name" name="address" placeholder="Enter Supplier Address">
                </div>
                @error('address')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="number" class="form-control" id="name" name="phone" placeholder="Enter Supplier Phone Number">
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