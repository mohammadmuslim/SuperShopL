<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Categori;
use App\Models\SubCategori;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Purchase::orderBy('id', 'desc')->get();
        return view('Purchase.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Categori = Categori::all();
        $SubCategori = SubCategori::all();
        $Brand = Brand::all();
        $unite = Unit::all();
        $Product = Product::all();
        $Supplier = Supplier::all();
        return view('Purchase.create',compact('Categori','SubCategori','Brand','unite','Product','Supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // DB::beginTransaction();
       
            //code...
            $input =  $request->all();
            $input['created_by'] = Auth::user()->id;
            $purchaseInput =[
                'purchase_date'=>$request->date,
                'challan_id' => $request->challan_id,
                'supplier_id' => $request->supplier_id,
                'note' => $request->note,
                'total_amount' => $request->total_amount,
                'created_by'=>Auth::user()->id
            ];
            

            foreach($request->items as $items){
                $item = (object) $singleItem;
                $purchaseItemInput = [
                    'purchase_id' => $purchase->id,
                    'product_id'  => $item->product_id,
                    'big_unit_price' => $item->big_unit_price??null,
                    'small_unit_price'=> $item->small_unit_price,
                    'big_unit_qty'=> $item->big_unit_qty??null,
                    'small_unit_qty'=>$item->small_unit_qty
                ];
                return $purchaseItemInput;
            }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
