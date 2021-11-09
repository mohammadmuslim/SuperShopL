<?php

namespace App\Http\Controllers;

use App\Models\SubCategori;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubCategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function createSubCategori()
    {
        //
        $data = Categori::get();
        return view('Setting.Categories.subCategori.create',compact('data'));
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
        // //
        $request->validate([
            'name'         => 'required'
        ]);
        $input = $request->all();
        $input['slug'] = Str::slug($request->name);
        $input['created_by'] = Auth::user()->id;
        $data = SubCategori::create($input);
        if($data){
            return redirect()->back()->with('success', 'SubCategori Successfully Created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategori  $subCategori
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategori $subCategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategori  $subCategori
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategori $subCategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategori  $subCategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategori $subCategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategori  $subCategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $SubCategori = SubCategori::findOrFail($id);
        $SubCategori->delete();
        return back();
    }
}
