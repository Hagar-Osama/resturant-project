<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::get();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menus.create');
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
            'name'=>'required|string|min:10|max:100',
            'description'=> 'required|string|min:10|max:255',
            'price' => 'required|double',
            'category_id' =>'required|integer'
        ]);
        Menu::create($request->except(['_token']));
        return redirect()->route('admin.menus.index')->with('success', 'Menu Has Been Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::findorfail($id);
        return view('admin.menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('admin.menus.edit', compact('menu'));
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
        if ($menu = Menu::find($id)) {
            $request->validate([
                'name'=>'required|string|min:10|max:100',
                'description'=> 'required|string|min:10|max:255',
                'price' => 'required|double',
                'category_id' =>'required|integer'
            ]);
            $menu->update($request->except(['_token']));
            return redirect()->route('admin.menus.index')->with('success', 'Menu Has Been Updated Successfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($menu = Menu::find($id)) {
            $menu->delete();
            return redirect()->route('admin.menus.index')->with('success', 'Menu Has Been Deleted Successfully');
        }
        return abort('404');
    }
}
