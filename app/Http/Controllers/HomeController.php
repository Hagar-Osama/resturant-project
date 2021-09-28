<?php

namespace App\Http\Controllers;

use App\Http\Traits\CategoryTrait;
use App\Http\Traits\InfoTrait;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Info;
use App\Models\Menu;
use com_exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function __construct(Chef $chef, Category $category, Info $info, Menu $menu)
   {
       $this->chefModel = $chef;
       $this->categoryModel = $category;
       $this->infoModel = $info;
       $this->menuModel = $menu;

   }
    public function index()
    {
        $categories = $this->categoryModel::get();
        $information = $this->infoModel::get();
        $chefs = $this->chefModel::get();
        $menus = $this->menuModel::get();
        return view('welcome', compact('categories'),
                               compact('information'),
                               compact('chefs'),
                               compact('menus'),
    );

    }

    public function menu()
    {
        return view('menu');
    }

    public function gallery()
    {
        return view ('gallery');
    }

    public function showchefs()
    {
        return view('chefs_page');
    }

    public function contact_us()
    {
        return view('contact_us');
    }

}

