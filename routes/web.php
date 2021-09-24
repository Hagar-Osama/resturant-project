<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/gallery',[HomeController::class, 'gallery'])->name('gallery');
Route::get('/showchefs',[HomeController::class, 'showchefs'])->name('chefs_page');
Route::get('contact_us',[HomeController::class, 'contact_us'])->name('contact_us');



Route::get('admin_panel', function () {
    return view('admin_panel');
})->name('admin.index');

Route::resource('contact', ContactController::class);
Route::resource('about', AboutController::class);
Route::resource('chefs', ChefController::class);
Route::resource('info', InfoController::class);
Route::resource('categories', CategoryController::class);
Route::resource('menus', MenuController::class);
Route::resource('galleries', GalleryController::class);
