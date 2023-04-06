<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoluntaryRegistrationController;

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

Route::get('/',  [IndexController::class, 'index_view']);

Route::get('/home',  [AdminController::class, 'admin_view'])->name('home');

Route::get('category',  [CategoryController::class, 'category_view'])->name('category');

Route::get('contact',  [ContactController::class, 'contact_view'])->name('contact');

Route::get('cart1',  [CartController::class, 'cart1_view'])->name('cart1');
Route::get('cart2',  [CartController::class, 'cart2_view'])->name('cart2');
Route::get('cart3',  [CartController::class, 'cart3_view'])->name('cart3');

Route::get('voluntary_register', [VoluntaryRegistrationController::class, 'create'])->name('voluntary_register');
Route::post('voluntary_register', [VoluntaryRegistrationController::class, 'store']);