<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Info;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $information = Info::get();
        return view('welcome', compact('categories'),
                               compact('information'),
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

