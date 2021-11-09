@extends('layouts.main')
@section('Content')
<div class="container">
   <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="m-0 font-weight-bold  btn btn-success" href="{{ URL::to('/') }}">All Purchase List</a>
            </div>
             <div class="card-body">
             @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form method="POST" action="{{ URL::to('/purchase') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group" style="width:30%;">
                    <label for="name">Purchase Date</label>
                    <input type="date" class="form-control" name="date" id="name" name="purchase_date" placeholder="Enter  Name">
                </div>
                {{-- @error('product_name')
                    <strong class="text-danger">{{ $message }}</strong> 
                @enderror --}}
                <div class="form-group">
                    <label for="name">Challan Id</label>
                    <input type="Number" class="form-control" id="name" name="challan_id" placeholder="challan_id" required>
                </div>
                <div class="form-group">
                    <label for="supplier_id">Supplier Select</label>
                    <select id="supplier_id"  class="form-control" name="supplier_id">
                        @foreach ($Supplier as $data)
                            <option value="{{$data->id}}">{{$data->supplier_name}}/{{$data->company_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">note</label>
                    <input type="text" class="form-control" id="name" name="note" placeholder="note" required>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="name">Product One</label>
                             <select id="name"  class="form-control" name="product_id[]">
                                @foreach ($Product as $data)
                                    <option value="{{$data->id}}">{{$data->product_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="name">big_unit_price</label>
                            <input type="Number" class="form-control" id="name" name="big_unit_price" placeholder="big_unit_price" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="name">small_unit_price</label>
                            <input type="Number" class="form-control" id="name" name="small_unit_price" placeholder="small_unit_price" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="name">quantity</label>
                            <input type="Number" class="form-control" id="name" name="quantity" placeholder="quantity" required>
                        </div>
                    </div>
                    
                </div>


                 <table class="table table-bordered table-hover" id="invoiceItem">
                    <tr>
                    <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                    <th width="15%">Item No</th>
                    <th width="38%">Item Name</th>
                    <th width="15%">Quantity</th>
                    <th width="15%">Price</th>
                    <th width="15%">Total</th>
                    </tr>
                    <tr>
                    <td><input class="itemRow" type="checkbox"></td>
                    <td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
                    <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>
                    <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                    <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
                    <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
                    <button class="btn btn-success" id="addRows" type="button">+ Add More</button>
                </div>
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
            </div>
        </div>
    </div>
</div>

@endsection