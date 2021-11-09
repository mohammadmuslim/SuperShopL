@extends('layouts.main')
@section('Content')
<div class="container">
   <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="m-0 font-weight-bold  btn btn-success" href="categori">All Categories List</a>
            </div>
             <div class="card-body">
             @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @error('name')
                    <strong class="text-danger">{{ $message }}</strong> 
            @enderror
            <form method="POST" action="/subCategori" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="cname">Sub-Categori Name</label>
                    <input type="text" class="form-control" id="cname" name = "name" placeholder="Enter Sub-Categori Name">
                </div>
                <div class="form-group">
                    <label class="" for="categori_id">Categori Select</label>
                    <select id="categori_id" class="form-control" name="category_id">
                         @foreach ($data as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                         @endforeach
                    </select>
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
            </div>
        </div>
    </div>
</div>

@endsection