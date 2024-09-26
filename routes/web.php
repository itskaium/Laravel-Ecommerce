<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', [HomeController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/products', [ProductsController::class, 'index']);


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/admin/dashboard', [HomeController::class, 'index'])->middleware('auth', 'admin');

Route::get('admin/categories', [CategoryController::class, 'index'])->middleware('auth', 'admin');
Route::post('admin/categories', [CategoryController::class, 'store'])->middleware('auth', 'admin');
Route::get('admin/delete_category/{id}', [CategoryController::class, 'delete_category'])->middleware('auth', 'admin');
Route::get('admin/edit_category/{id}', [CategoryController::class, 'edit_category'])->middleware('auth', 'admin');
Route::post('/admin/update_category/{id}', [CategoryController::class, 'update_category'])->middleware('auth', 'admin');

Route::get('/admin/products', [ProductController::class, 'index'])->middleware('auth', 'admin');
Route::get('/admin/add_products', [ProductController::class, 'add'])->middleware('auth', 'admin');
Route::post('/admin/products', [ProductController::class, 'store'])->middleware('auth', 'admin');

Route::get('admin/orders', [OrderController::class, 'index'])->middleware('auth', 'admin');
Route::get('/onTheWay/{id}', [OrderController::class, 'onTheWay'])->middleware('auth', 'admin');
Route::get('/delivered/{id}', [OrderController::class, 'delivered'])->middleware('auth', 'admin');


Route::get('/add_cart/{id}', [CartController::class, 'addToCart'])->middleware(['auth', 'verified']);
Route::get('mycart', [CartController::class, 'mycart'])->middleware(['auth', 'verified']);
Route::get('/delete_cart/{id}', [CartController::class, 'delete_cart'])->middleware(['auth', 'verified']);
Route::post('/confirm_order', [CartController::class, 'confirm_order'])->middleware(['auth', 'verified']);
Route::controller(PaymentController::class)->group(function(){

    Route::get('stripe/{value}', 'stripe');

    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');

})->middleware(['auth', 'verified']);