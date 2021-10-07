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
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/showchefs', [HomeController::class, 'showchefs'])->name('chefs_page');
Route::get('contact_us', [HomeController::class, 'contact_us'])->name('contact_us');


Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    /* =========================Route Contact Admin================================== */

    Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contacts/store', [ContactController::class, 'store'])->name('contact.store');

    /* =========================Route About Admin================================== */

    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/about/edit/{info}', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/update/{info}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('/about/{info}', [AboutController::class, 'destroy'])->name('about.destroy');
    /* =========================Route Chefs Admin================================== */

    Route::get('/chefs', [ChefController::class, 'index'])->name('chefs.index');
    Route::get('/chefs/create', [ChefController::class, 'create'])->name('chefs.create');
    Route::post('/chefs/store', [ChefController::class, 'store'])->name('chefs.store');
    Route::get('/chefs/edit/{info}', [ChefController::class, 'edit'])->name('chefs.edit');
    Route::put('/chefs/update/{info}', [ChefController::class, 'update'])->name('chefs.update');
    Route::delete('/chefs/{info}', [ChefController::class, 'destroy'])->name('chefs.destroy');
    /* =========================Route information Admin================================== */

    Route::get('/information', [InfoController::class, 'index'])->name('information.index');
    Route::get('/information/create', [InfoController::class, 'create'])->name('information.create');
    Route::post('/information/store', [InfoController::class, 'store'])->name('information.store');
    Route::get('/information/edit/{info}', [InfoController::class, 'edit'])->name('information.edit');
    Route::put('/information/update/{info}', [InfoController::class, 'update'])->name('information.update');
    Route::delete('/information/{info}', [InfoController::class, 'destroy'])->name('information.destroy');
    /* =========================Route Categories Admin================================== */

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->where(['id' => '[0-9]+'])->name('categories.edit');
    Route::put('/categories/update/{category}', [CategoryController::class, 'update'])->where(['id' => '[0-9]+'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('categories.destroy');
    /* =========================Route Menus Admin================================== */

    Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
    Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');
    Route::post('/menus/store', [MenuController::class, 'store'])->name('menus.store');
    Route::get('/menus/edit/{menu}', [MenuController::class, 'edit'])->name('menus.edit');
    Route::put('/menus/update/{menu}', [MenuController::class, 'update'])->name('menus.update');
    Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])->name('menus.destroy');

    /* =========================Route Galleries Admin================================== */

    Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
    Route::get('/galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
    Route::post('/galleries/store', [GalleryController::class, 'store'])->name('galleries.store');
    Route::get('/galleries/edit/{gallery}', [GalleryController::class, 'edit'])->name('galleries.edit');
    Route::put('/galleries/update/{gallery}', [GalleryController::class, 'update'])->name('galleries.update');
    Route::delete('/galleries/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy');

    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

});


Route::get('/admin/login', [AuthController::class, 'loginPage'])->name('admin.loginpage');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');

