<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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


    Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');

    Route::resource('contacts', ContactController::class);
    Route::resource('about', AboutController::class);
    Route::resource('chefs', ChefController::class);
    Route::resource('information', InfoController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('galleries', GalleryController::class);




Route::get('/admin/login',[AuthController::class, 'loginPage'])->name('admin.loginpage');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');

Route::post('/admin/logout',[AuthController::class, 'logout'])->name('admin.logout');
