<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::latest()->paginate('4');

        return view('admin.brand.index',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Brand::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name).uniqid()
        ]);

        return redirect()->back()->with(['success' => 'brand created success']);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::where('slug',$id)->first();

        if(!$brand){
            return redirect()->back()->with(['error' => 'brand slug not found']);
        }

        return view('admin.brand.edit',compact('brand'));
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
        $brand = Brand::where('slug',$id)->first();

        if(!$brand){
            return redirect()->back()->with(['error' => 'brand slug not found']);
        }

        $brand->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name).uniqid()
        ]);

        return redirect()->route('brand.index')->with(['success'=>'brand updated successful']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $brand = Brand::where('slug',$id)->first();

        if(!$brand){
            return redirect()->back()->with(['error' => 'brand slug not found']);
        }

        $brand->delete();

        return redirect()->route('brand.index')->with(['success' => 'brand delete success']);
    }
}
