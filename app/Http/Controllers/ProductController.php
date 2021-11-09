<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categori;
use App\Models\SubCategori;
use App\Models\Brand;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Product::orderBy('id', 'desc')->get();
        return view('Product.index',compact('data'));
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
        return view('Product.create',compact('Categori','SubCategori','Brand','unite'));
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

        $request->validate([
            'product_name'         => 'required|unique:products,product_name',
            'product_code'         => 'required|unique:products,product_code',
            'small_unit_id'         => 'required'
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($request->product_name);
        $input['created_by'] = Auth::user()->id;
        $data = Product::create($input);
        return redirect()->back()->with('success', 'Products Successfully Update');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Product::with(['categori','subcategori','brand','bigunit','smallunit','creator'])->find($id);
        return view('Product.view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $id)
    {
        //
        return "this is edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
