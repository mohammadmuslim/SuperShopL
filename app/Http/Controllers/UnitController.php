<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Unit::orderBy('id', 'desc')->get();
        return view('Unite.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Unite.create');
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
            'name'         => 'required|unique:units,name',
            'type'         => 'required'
        ]);
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $data = Unit::create($input);
        return redirect()->back()->with('success', 'Unit Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Unit::find($id);
        return view('Unite.edite',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        //
        $validation = $request->validate([
            'name'         => 'required|unique:units,name',
            'type'         => 'required'
        ]);
        $input = Unit::find($id);
        $input->name = $request->name;
        $input->type = $request->type;
        $input['created_by'] = Auth::user()->id;
        $input->save();
        return redirect()->back()->with('success', 'Unite Successfully Update');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $supplier = Unit::findOrFail($id);
        $supplier->delete();
        return back();
    }
}
