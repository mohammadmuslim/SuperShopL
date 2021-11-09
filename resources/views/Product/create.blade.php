@extends('layouts.main')
@section('Content')
<div class="container">
   <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="m-0 font-weight-bold  btn btn-success" href="{{ URL::to('/product') }}">All Product List</a>
            </div>
             <div class="card-body">
             @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form method="POST" action="{{ URL::to('/product') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="product_name" placeholder="Enter Product Name">
                </div>
                @error('product_name')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror
                
                <div class="form-group">
                    <label for="name">Select Categories</label>
                    <select id="name" class="form-control" name="category_id">
                        @foreach ($Categori as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Select Sub-Categories</label>
                    <select id="name" class="form-control" name="sub_category_id">
                        @foreach ($SubCategori as $sdata)
                            <option value="{{$sdata->id}}">{{$sdata->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Select Brand Name</label>
                    <select id="name"  class="form-control" name="brand_id">
                        @foreach ($Brand as $cdata)
                            <option value="{{$cdata->id}}">{{$cdata->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="name">Product Code</label>
                    <input type="text" class="form-control" id="name" name="product_code" placeholder="Enter Product Code">
                </div>
                 @error('product_code')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror
                <div class="form-group">
                    <label for="name">Specification</label>
                    <input type="text" class="form-control" id="name" name="specification" placeholder="Specification">
                </div>
                
                <div class="form-group">
                 <label> Select Small Unite</label>
                   @foreach ($unite as $data )
                       <div class="form-check">
                       @if ($data->type === 2)
                        <input class="form-check-input" type="radio" name="small_unit_id" value="{{$data->id}}" id="flexRadioDefault">
                        
                        <label class="form-check-label" for="flexCheckDefault">
                        {{$data->name}}
                        </label>
                        @endif
                        
                    </div>
                   @endforeach
                </div>
                 @error('small_unit_id')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror
                <div class="form-group">
                <label> Select Big Unite</label>
                   @foreach ($unite as $data )
                       <div class="form-check">
                       @if ($data->type === 1)
                        <input class="form-check-input" type="radio" name="big_unit_id" value="{{$data->id}}" id="flexRadioDefaul">
                        <label class="form-check-label" for="flexCheckDefaul">
                        {{$data->name}}
                        </label>
                        @endif
                        
                    </div>
                   @endforeach
                </div>
                
                <div class="form-group">
                    <label for="name">Stock Limitation</label>
                    <input type="Number" class="form-control" id="name" name="stock_limitation" placeholder="Stock Limitation" required>
                </div>
                
                <input type="submit" class="btn btn-primary">
            </form>
            </div>
        </div>
    </div>
</div>

@endsection