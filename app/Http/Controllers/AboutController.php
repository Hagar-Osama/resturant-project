<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::get();
        return view('admin.about-us.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about-us.create');
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
            'body' => 'required|string|min:10',
        ]);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:png,jpg,svg,gif|max:2048'

            ]);
            $image = $request->file('image');
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('images/about_us', $image_name);
            About::create([
                'body' => $request->body,
                'image' => $image_name
            ]);
        }
        return redirect()->route('admin.about-us.index')->with('success', 'About Us Has Been Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about_u = About::findorfail($id);
        return view('admin.about-us.show', compact('about_u'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about_u = About::find($id);
        return view('admin.about-us.edit', compact('about_u'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($about = About::find($id)) {
            $request->validate([
                'body' => 'required|string|min:10',
            ]);
            $data = $request->except(['_token']);
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'image|mimes:png,jpg,svg,gif|max:2048'

                ]);
                $image = $request->file('image');
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move('images/about_us', $image_name);
                $data['image'] = $image_name;
                if($about->image) {
                    unlink('images/about_us/'.$about->image);
                }
            }
        }
        $about->update($data);
        return redirect()->route('admin.about-us.index')->with('success', 'About Us Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($about = About::find($id)) {
            if ($about->image) {

                unlink('images/about_us/'.$about->image);
            }
            $about->delete();
            return redirect()->route('admin.about-us.index')->with('success', 'About Us Has Been Deleted Successfully');
        }
        return abort('404');
    }
}
