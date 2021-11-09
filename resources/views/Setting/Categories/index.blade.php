@extends('layouts.main')
@section('Content')
<div class="container">
   <div class="container-fluid">

                    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Categories List</h1>

                    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="m-0 font-weight-bold  btn btn-success" href="/create-categori">Create A New Categori</a>
            </div>
            <div class="card-header py-3">
                    <form class="d-flex" action="/searchBrand">
                        <input class="form-control me-2 serarch_box" type="search"  name="query" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                            <tr>
                                <th> Categori Name</th>
                                <th> Sub Categori</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td><a class="btn btn-info" href="Cat-Sub/{{$item->id}}">Sub-Categories</a></td>
                                    <td>
                                        <a title="Edit" class="btn btn-success btn-sm" href="" style="float: left;margin-right: 10px;">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a>
                                            <form method="POST" action="">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm btn-sm" data-toggle="tooltip" title='Delete'>
                                                <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </a>
                                    </td>
                                </tr>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
