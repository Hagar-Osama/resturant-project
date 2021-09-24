<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chefs = Chef::get();
        return view('chefs.index', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chefs.create');
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
            'name'=>'required|string|min:5|max:100',
            'description'=>'required|string|min:5|max:255'
        ]);
        if ($request->hasFile('image')){
        $request->validate([
            'image' => 'image|mimes:png,jpg,svg,gif|max:2048'
        ]);
        $image = $request->file('image');
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move('images/chefs', $image_name);
        Chef::create([
            'name' => $request->name,
            'description'=>$request->description,
            'image' => $image_name
        ]);
    }
    return redirect()->route('chefs.index')->with('success', 'Chef Us Has Been Added Successfully');
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chef = Chef::findorfail($id);
        return view('chefs.show', compact('chef'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chef = Chef::find($id);
        return view('chefs.edit', compact('chef'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         if($row = Chef::find($id)) {
            $request->validate([
                'name'=>'required|string|min:5|max:100',
                'description'=>'required|string|min:5|max:255'
            ]);
            $data = $request->except(['_token']);

            if ($request->hasFile('image')){
                $request->validate([
                    'image' => 'image|mimes:png,jpg,svg,gif|max:2048'
                ]);
                $image = $request->file('image');
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move('images/chefs', $image_name);
                $data['image'] = $image_name;
                if($row->image) {
                    unlink('images/chefs/'.$row->image);
                }
            }
        }
         $row->update($data);
         return redirect()->route('chefs.index')->with('success', 'Chef Has Been Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($chef = Chef::find($id)) {
            if ($chef->image) {

                unlink('images/chefs/'.$chef->image);
            }
            $chef->delete();
            return redirect()->route('chefs.index')->with('success', 'Chef Has Been Deleted Successfully');
        }
        return abort('404');
    }

}
