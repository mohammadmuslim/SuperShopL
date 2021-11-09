<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Supplier::orderBy('id', 'desc')->get();
        return view('Supplier.index',compact('data'));
    }

    public function createSupplier()
    {
        //
        return view('Supplier.create');
    }
    function search(Request $req){
       
        $data = Supplier::where('supplier_name','like','%'.$req->input('query').'%')->get();
        return view('Supplier.index',compact('data'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        $validation = $request->validate([
            'supplier_name'         => 'required|unique:suppliers,supplier_name',
            'company_name'         => 'required',
            'address'         => 'required',
            'phone'         => 'required'
        ]);
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $data = Supplier::create($input);
        return redirect()->back()->with('success', 'Supplier Successfully Added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Supplier::find($id);
        return view('Supplier.update',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'supplier_name'         => 'required|unique:suppliers,supplier_name',
            'company_name'         => 'required',
            'address'         => 'required',
            'phone'         => 'required'
        ]);
      
        $input = Supplier::find($id);
        $input->supplier_name = $request->supplier_name;
        $input->company_name = $request->company_name;
        $input->address = $request->address;
        $input->phone = $request->phone;
        $input->created_by = Auth::user()->id;
        $input->save();
        return redirect()->back()->with('success', 'Supplier Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return back();
    }
}
