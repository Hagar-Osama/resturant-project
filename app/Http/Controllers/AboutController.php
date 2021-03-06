<?php

namespace App\Http\Controllers;

use App\Http\Traits\aboutTrait;
use App\Http\Traits\aboutFileTrait;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use aboutTrait;
    use aboutFileTrait;
    private $aboutModel;
    public function __construct(About $about)
    {
        $this->aboutModel = $about;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = $this->aboutModel::get();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            $this->uploadFile($image, 'about',$image_name);
            $this->aboutModel::create([
                'body' => $request->body,
                'image' => $image_name
            ]);
        }
        return redirect()->route('about.index')->with('success', 'About Us Has Been Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about_u = $this->getAboutById($id);
        return view('admin.about.show', compact('about_u'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about_u = $this->getAboutById($id);
        return view('admin.about.edit', compact('about_u'));
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
                $oldImagePath = 'images/about'.$about->image;
                $this->uploadFile($image, 'about',$image_name, $oldImagePath);
                $data['image'] = $image_name;

            }
            $about->update($data);
            return redirect()->route('about.index')->with('success', 'About Us Has Been Updated Successfully');
        }
        return abort('404');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($about = $this->getAboutById($id)) {
            if ($about->image) {

                unlink('images/about/'.$about->image);
            }
            $about->delete();
            return redirect()->route('about.index')->with('success', 'About Us Has Been Deleted Successfully');
        }
        return abort('404');
    }
}
