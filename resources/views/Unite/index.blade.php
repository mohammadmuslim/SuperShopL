@extends('layouts.main')
@section('Content')
<div class="container">
   <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">All Unite List</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="m-0 font-weight-bold  btn btn-success" href="{{ URL::to('/unite-create') }}">Create A New Unite</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Unite Name</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                          <tr>
                                            <td>{{$item->name}}</td>
                    
                                            <td>
                                                @if ($item->type === 2)
                                               Small Unite
                                            @else
                                                Big  Unite
                                            @endif
                                            </td>
                                            <td>
                                                <a title="Edit" class="btn btn-success btn-sm" href="{{ URL::to('unite-edit/'.$item->id) }}" style="float: left;margin-right: 10px;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a>
                                                    <form method="POST" action="unite/{{$item->id}}">
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

