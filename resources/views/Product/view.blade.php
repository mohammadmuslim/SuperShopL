@extends('layouts.main')
@section('Content')
<div class="container">
   <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Product Details</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="m-0 font-weight-bold  btn btn-success" href="{{ URL::to('/product') }}">View All Product</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                               <div class="card">
                                <img class="card-img-top" style="width:100px;" src="{{ asset($data['brand']->image) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$data->product_name}}({{$data['brand']->name}})</h5>
                                     <p class="card-text">Product Code:({{$data->product_code}})</p>
                                    <p class="card-text">{{$data->specification}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{$data['categori']->name}}/{{$data['subcategori']->name}}</li>
                                    <li class="list-group-item">Unite:
                                    @if(empty($data['big_unit_id']))
                                        
                                        {{$data['smallunit']->name}}
                                    @else
                                        {{$data['smallunit']->name}}/
                                        {{$data['bigunit']->name}}
                                    @endif
                                    </li>
                                </ul>
                                <div class="card-body">
                                    <p>Stock Limitation:{{$data->stock_limitation}}</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</div>
@endsection


