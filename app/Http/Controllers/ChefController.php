<?php

namespace App\Http\Controllers;

use App\Http\Traits\chefTrait;
use App\Http\Traits\fileTrait;
use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{

    use chefTrait;
    use fileTrait;
    private $chefModel;
    public function __construct(Chef $chef)
    {
        $this->chefModel = $chef;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chefs = $this->chefModel::get();
        return view('admin.chefs.index', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chefs.create');
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
        $this->uploadFile($image,'chefs',$image_name);
        // $image->move('images/chefs', $image_name);
        $this->chefModel::create([
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
    public function show($chefId)
    {
        $chef = $this->getChefById($chefId);
        return view('chefs.show', compact('chef'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function edit($chefId)
    {
        $chef = $this->getChefById($chefId);
        return view('admin.chefs.edit', compact('chef'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $chefId)
    {
         if($chef = $this->getChefById($chefId)) {
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
                $oldImagePath = 'images/chefs'. $chef->image;
                $this->uploadfile($image, 'chefs', $image_name, $oldImagePath);
                $data['image'] = $image_name;
            }
        }
         $chef->update($data);
         return redirect()->route('chefs.index')->with('success', 'Chef Has Been Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function destroy($chefId)
    {
        if ($chef = $this->getChefById($chefId)) {
            if ($chef->image) {

                unlink('images/chefs/'.$chef->image);
            }
            $chef->delete();
            return redirect()->route('chefs.index')->with('success', 'Chef Has Been Deleted Successfully');
        }
        return abort('404');
    }

}
