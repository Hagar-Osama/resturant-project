<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');

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

