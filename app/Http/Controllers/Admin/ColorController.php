<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color = Color::latest()->paginate('4');

        return view('admin.color.index',compact('color'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
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

        Color::create([
            'slug' => Str::slug($request->name.uniqid()),
            'name' => $request->name
        ]);

        return redirect()->back()->with(['success' => 'color created']);
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
        $color = Color::where('slug',$id)->first();

        if(!$color){
            return redirect()->back()->with(['error','color slug not found']);
        }

        return view('admin.color.edit',compact('color'));
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

        $color = Color::where('slug',$id)->first();

        if(!$color){
            return redirect()->back()->with(['error' => 'color slug not found']);
        }

        $color->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name).uniqid()
        ]);

        return redirect()->route('color.index')->with(['success' => 'color updated successful']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::where('slug',$id)->first();

        if(!$color){
            return redirect()->back()->with(['error' => 'color slug not found']);
        }

        $color->delete();

        return back()->with(['error' => 'color delete success']);
    }
}
