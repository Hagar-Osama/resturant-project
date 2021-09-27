<?php

namespace App\Http\Controllers;

use App\Http\Traits\CategoryTrait;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use CategoryTrait;
    private $categoryModel;
    public function __construct(Category $category)
    {
         $this->categoryModel = $category;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryModel::get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => 'required|string|max:255|min:3',

        ]);
        $this->categoryModel::create($request->except(['_token']));
        return redirect()->route('categories.index')->with('success', 'Category Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($categoryId)
    {
        $category = $this->getCategoryById($categoryId);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryId)
    {
        $category = $this->getCategoryById($categoryId);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryId)
    {
        if ($category =  $this->getCategoryById($categoryId)) {

            $request->validate([
                'name' => 'required|string|max:255|min:3',
            ]);
            $category->update($request->except(['_token']));
           return redirect()->route('categories.index')->with('success', 'Category Has Been Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryId)
    {
        if ($category = $this->getCategoryById($categoryId)) {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Category Has Been Deleted Successfully');
        }
        return abort('404');
    }
}
