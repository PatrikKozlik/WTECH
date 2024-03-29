<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoluntaryRegistrationController;
use App\Http\Controllers\ProductsListController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/',  [IndexController::class, 'index_view'])->name('index');

Route::get('/admin',  [AdminController::class, 'admin_view'])->name('admin')->middleware('auth');
Route::get('/admin/edit/{value}',  [AdminController::class, 'admin_edit_view'])->name('admin_edit')->middleware('auth');
Route::post('/admin/save', [AdminController::class, 'admin_edit_save'])->name('admin_edit_save')->middleware('auth');
Route::get('/admin/create',  [AdminController::class, 'admin_create_product_view'])->name('admin_create_product_view')->middleware('auth');
Route::post('/admin/create/save',  [AdminController::class, 'admin_create_product_save'])->name('admin_create_product_save')->middleware('auth');
Route::get('/admin/delete/{value}',  [AdminController::class, 'admin_delete_product'])->name('admin_delete_product')->middleware('auth');
Route::get('/admin/deletefile/{value}/{filename}',  [AdminController::class, 'admin_delete_file'])->name('admin_delete_file')->middleware('auth');

// old path to admin zone
Route::get('/home', function () {
    return redirect()->route('admin');
});

Route::get('/products_list',  [ProductsListController::class, 'product_list_view'])->name('products_list');

Route::get('category/{type}',  [CategoryController::class, 'category_filter'])->name('category');

Route::get('/product/{value}',  [ProductController::class, 'product_view'])->name('product');

Route::get('contact',  [ContactController::class, 'contact_view'])->name('contact');

Route::get('profile',  [ProfileController::class, 'profile_view'])->name('profile')->middleware('auth');
Route::post('profile',  [ProfileController::class, 'edit_profile']);

Route::post('addToCart',  [CartController::class, 'cart_add'])->name('addToCart');
Route::post('remove',  [CartController::class, 'cart_remove'])->name('remove_from_cart');
Route::get('cart1',  [CartController::class, 'cart1_view'])->name('cart1');
Route::post('cart2',  [CartController::class, 'cart2_view'])->name('cart2');
Route::post('cart3',  [CartController::class, 'cart3_view'])->name('cart3');
Route::post('finish',  [CartController::class, 'save_product'])->name('save_product');
Route::post('finish_registered',  [CartController::class, 'save_registred'])->name('finish_registered');

Route::get('voluntary_register', [VoluntaryRegistrationController::class, 'create'])->name('voluntary_register');
Route::post('voluntary_register', [VoluntaryRegistrationController::class, 'store']);