<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [FrontEndController::class, 'home'])->name('home');
Route::get('/products', [FrontEndController::class, 'products'])->name('products');
Route::get('/preview/{id}', [FrontEndController::class, 'view_product'])->name('product.preview');
Route::get('/preview/{id}', [FrontEndController::class, 'preview'])->name('product.preview');
Route::get('/product-by-category/{cat_id}', [FrontEndController::class, 'productByCategory'])->name('category.product');
Route::post('/add-to-cart', [CartController::class, 'store'])->name('add.toCart');
Route::get('/check-cart', [CartController::class, 'checkCart'])->name('check.cart');
Route::post('/edit-cart-qty', [CartController::class, 'editCartQty'])->name('edit.qty');
Route::post('/remove-item', [CartController::class, 'removeItem'])->name('remove.cartItem');
Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');
/*
|--------------------------------------------------------------------------
| Authenticate User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [FrontEndController::class, 'index'])->name('dashboard');
    Route::get('/purchase/history', [FrontEndController::class, 'purchase'])->name('purchase.history');
    Route::get('/order-page', [OrderController::class, 'index'])->name('order');
    Route::post('/order/product', [OrderController::class, 'orderProduct'])->name('order.product');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login')->middleware('guest:admin');

Route::post('/admin/login/store', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
    //custome routing
    //category route
    Route::get('/add/category', [CategoryController::class, 'add_category'])->name('add.category');
    Route::post('/store/category', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/manage/category', [CategoryController::class, 'manage_category'])->name('manage.category');
    Route::post('/delete/category', [CategoryController::class, 'delete'])->name('delete.category');
    Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/update/category', [CategoryController::class, 'update'])->name('update.category');
    //brand
    Route::get('/add/brand', [BrandController::class, 'add_brand'])->name('add.brand');
    Route::post('/store/brand', [BrandController::class, 'store'])->name('store.brand');
    Route::get('/manage/brand', [BrandController::class, 'manage_brand'])->name('manage.brand');
    Route::post('/delete/brand', [BrandController::class, 'delete_brand'])->name('delete.brand');
    Route::get('/edit/brand/{id}', [BrandController::class, 'edit'])->name('edit.brand');
    Route::post('/update/brand', [BrandController::class, 'update'])->name('update.brand');
    //product
    Route::get('/add/product',[ProductController::class, 'add_product'])->name('add.product');
    Route::post('/store/product',[ProductController::class, 'store'])->name('store.product');
    Route::get('/manage/product',[ProductController::class, 'manage_product'])->name('manage.product');
    Route::get('/edit/product/{pro_id}',[ProductController::class, 'edit_product'])->name('edit.product');
    Route::post('/update/product',[ProductController::class, 'update'])->name('update.product');
    Route::post('/delete/product',[ProductController::class, 'delete_product'])->name('delete.product');
});
require __DIR__.'/auth.php';
