<?php

namespace App\Http\Controllers;

use App\Http\Traits\aboutTrait;
use App\Http\Traits\CategoryTrait;
use App\Http\Traits\chefTrait;
use App\Http\Traits\galleryTrait;
use App\Http\Traits\InfoTrait;
use App\Http\Traits\menuTrait;
use App\Models\About;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Gallery;
use App\Models\Info;
use App\Models\Menu;
use com_exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use CategoryTrait;
    use chefTrait;
    use galleryTrait;
    use InfoTrait;
    use menuTrait;
    use aboutTrait;
   public function __construct(Chef $chef, Category $category, Info $info, Menu $menu, Gallery $gallery, About $about)
   {
       $this->chefModel = $chef;
       $this->categoryModel = $category;
       $this->infoModel = $info;
       $this->menuModel = $menu;
       $this->gallModel = $gallery;
       $this->aboutModel = $about;

   }
    public function index()
    {
        $categories = $this->getCategory();
        $information = $this->getInfo();
        $chefs = $this->getChefs();
        $menus = $this->getMenus();
        $galleries = $this->getGalleries();
        $about = $this->getAbout();
        return view('welcome', compact('categories', 'information', 'chefs','menus','galleries', 'about'));
                        



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

