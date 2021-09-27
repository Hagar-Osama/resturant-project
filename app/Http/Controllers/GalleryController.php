<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::get();
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.create');
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
            'category_id' =>'required'
        ]);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:png,jpg,svg,gif|max:2048'

            ]);
            $image = $request->file('image');
            $image_name = rand(). '.' .$image->getClientOriginalExtension();
            $image->move('images/galleries', $image_name);
            Gallery::create([
                'name'=>$request->name,
                'category_id'=>$request->category_id,
                'image'=>$image_name
            ]);

        }
        return redirect()->route('admin.galleries.index')->with('success', 'Gallery Has Been Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::findorfail($id);
        return view('admin.galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($gallery = Gallery::find($id)) {
            $request->validate([
                'name'=>'required|string|min:5|max:100',
                'category_id' =>'required'
            ]);
            $data  =$request->except(['_token']);

            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'image|mimes:png,jpg,svg,gif|max:2048'

                ]);
                $image = $request->file('image');
                $image_name = rand(). '.' .$image->getClientOriginalExtension();
                $image->move('images/galleries', $image_name);
                Gallery::create([
                    'name'=>$request->name,
                    'category_id'=>$request->category_id,
                    'image'=>$image_name
                ]);
                $data['image'] = $image_name;
                if($gallery->image) {
                    unlink('images/galleries/'.$image_name);
                }
            }
        }
        $gallery->update($data);
        return redirect()->route('admin.galleries.index')->with('success', 'Gallery Has Been Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($gallery = Gallery::find($id)) {
            if ($gallery->image) {
                unlink('images/galleries/'.$gallery->image);
            }
            $gallery->delete();
            return redirect()->route('admin.galleries.index')->with('success', 'Gallery Has Been Deleted Successfully');
        }
        return abort('404');
    }
}
