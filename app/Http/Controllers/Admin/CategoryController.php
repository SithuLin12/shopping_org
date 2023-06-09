<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::latest()->paginate('5');
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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

        Category::create([
            'slug' => Str::slug($request->name.uniqid()),
            'name' => $request->name
        ]);

        return redirect()->back()->with(['success'=>'category new created ']);
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
        $category = Category::where('slug',$id)->first();
        if(!$category){
            return redirect()->back()->with(['error' => 'Category not found']);
        }

        return view('admin.category.edit',compact('category'));
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
        $request->validate([
            'name' => 'required'
        ]);

        $category = Category::where('slug',$id)->first();
        if(!$category){
            return redirect()->back()->with(['error' => 'Category not found']);
        }

        Category::where('slug',$id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name.uniqid())
        ]);

        return redirect()->route('category.index')->with(['success' => 'Category Updated ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('slug',$id)->first();
        if(!$category){
            return redirect()->back()->with(['error' => 'Category not found']);
        }

        $category->delete();

        return redirect()->route('category.index')->with(['delete' =>'category is deleted']);

    }
}
