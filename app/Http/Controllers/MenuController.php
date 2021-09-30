<?php

namespace App\Http\Controllers;

use App\Http\Traits\menuTrait;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    use menuTrait;
    private $menuModel;
    public function __construct(Menu $menu)
    {
        $this->menuModel = $menu;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->menuModel->get();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|min:10|max:100',
            'description' => 'required|string|min:10|max:255',
            'price' => 'required',
            'category_id' => 'required'
        ]);
        $this->menuModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('menus.index')->with('success', 'Menu Has Been Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($menuId)
    {
        $menu = $this->getMenuById($menuId);
        return view('admin.menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($menuId)
    {
        $menu = $this->getMenuById($menuId);
        $categories = Category::get();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $menuId)
    {
        if ($menu = $this->getMenuById($menuId)) {
            $request->validate([
                'name' => 'required|string|min:10|max:100',
                'description' => 'required|string|min:10|max:255',
                'price' => 'required',
                'category_id' => 'required'
            ]);
            $menu->update($request->except(['_token']));
            return redirect()->route('menus.index')->with('success', 'Menu Has Been Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($menuId)
    {
        if ($menu = $this->getMenuById($menuId)) {
            $menu->delete();
            return redirect()->route('menus.index')->with('success', 'Menu Has Been Deleted Successfully');
        }
        return abort('404');
    }
}
