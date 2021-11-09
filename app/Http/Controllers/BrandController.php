<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\fileExists;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Brand::orderBy('id', 'desc')->get();
        return view('Setting.Brand.index',compact('data'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Setting.Brand.createBrand');
        
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
            'name'         => 'required|unique:brands,name',
            'image'      => 'image|mimes:jpg,png,jpeg,gif|max:3072',
        ]);
        $input = $request->all();

        if($request->hasFile('image')) {
            $user_img_name = $request->file('image');
            $user_name = time().'.'.$user_img_name->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $user_img_name->move($destinationPath, $user_name);
           
            $input['image'] = 'images'.'/'.$user_name;
    
          }
        $input['slug'] = Str::slug($request->name);
        $input['created_by'] = Auth::user()->id;
        $data = Brand::create($input);
        
        return redirect()->back()->with('success', 'Brand Successfully Created');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo "first";
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Brand::find($id);
        return view('Setting.Brand.update',compact('data'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'         => 'required|unique:brands,name',
        ]);
        $input = Brand::find($id);
        $input->name = $request->input('name');
        $input->slug = Str::slug($request->input('name'));
        $input->created_by = Auth::user()->id;

        
        if($request->hasFile('image')) {
            $user_img_name = $request->file('image');
            @unlink(public_path('images/' . $input->image));
            $user_name = time().'.'.$user_img_name->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $user_img_name->move($destinationPath, $user_name);
           
            $input['image'] = 'images'.'/'.$user_name;
    
          }
        $input->update();
        return redirect()->back()->with('success', 'Brand Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $brand = Brand::findOrFail($id);
        if(file_exists(public_path($brand->image))){
            unlink(public_path($brand->image));
        }
        $brand->delete();
        return back();
    }
}
