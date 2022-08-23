<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\AdminOrderController;
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



Route::get('/', [EcommerceController::class, 'index'])->name('home');
Route::get('/product-category/{id}', [EcommerceController::class, 'productCategory'])->name('product-category');
Route::get('/product-sub-category/{id}', [EcommerceController::class, 'productSubCategory'])->name('product-sub-category');
Route::get('/product-detail-info/{id}', [EcommerceController::class, 'productDetail'])->name('product-detail');

//Cart Controller
Route::post('/add-to-cart/{id}', [CartController::class, 'index'])->name('add-to-cart');
Route::get('/show-cart-product', [CartController::class, 'show'])->name('show-cart');
Route::get('/delete-cart-product/{id}', [CartController::class, 'delete'])->name('delete-cart-product');
Route::post('/update-cart-product/{id}', [CartController::class, 'update'])->name('update-cart-product');


//Checkout Controller
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/new-order', [CheckoutController::class, 'newOrder'])->name('new-order');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('complete-order');


Route::get('/customer-account', [CustomerAuthController::class, 'myAccount'])->name('customer-account')->middleware('customer.logout');
Route::post('/customer-login', [CustomerAuthController::class, 'loginCheck'])->name('customer-login');
Route::post('/customer-register', [CustomerAuthController::class, 'register'])->name('customer-register');
Route::get('/customer-logout', [CustomerAuthController::class, 'logout'])->name('customer-logout');

Route::get('/customer-dashboard', [CustomerDashboardController::class, 'dashboard'])->name('customer-dashboard')->middleware('customer');
Route::get('/customer-order', [CustomerDashboardController::class, 'orders'])->name('customer-order');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('/add-category', [CategoryController::class, 'add'])->name('category.add');
    Route::post('/create-category', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/delete-category/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/manage-category', [CategoryController::class, 'manage'])->name('category.manage');

    Route::get('/add-sub-category', [SubCategoryController::class, 'add'])->name('sub-category.add');
    Route::post('/create-sub-category', [SubCategoryController::class, 'create'])->name('sub-category.create');
    Route::get('/manage-sub-category', [SubCategoryController::class, 'manage'])->name('sub-category.manage');
    Route::get('/edit-sub-category/{id}', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::post('/update-sub-category/{id}', [SubCategoryController::class, 'update'])->name('sub-category.update');
    Route::post('/delete-sub-category/{id}', [SubCategoryController::class, 'delete'])->name('sub-category.delete');

    Route::get('/add-brand', [BrandController::class, 'add'])->name('brand.add');
    Route::post('/create-brand', [BrandController::class, 'create'])->name('brand.create');
    Route::get('/manage-brand', [BrandController::class, 'manage'])->name('brand.manage');
    Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/delete-brand/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    Route::post('/update-brand/{id}', [BrandController::class, 'update'])->name('brand.update');

    Route::get('/add-unit', [UnitController::class, 'add'])->name('unit.add');
    Route::post('/create-unit', [UnitController::class, 'create'])->name('unit.create');
    Route::get('/manage-unit', [UnitController::class, 'manage'])->name('unit.manage');
    Route::get('/edit-unit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/delete-unit/{id}', [UnitController::class, 'delete'])->name('unit.delete');
    Route::post('/update-unit/{id}', [UnitController::class, 'update'])->name('unit.update');

    Route::get('/add-product', [ProductController::class, 'add'])->name('product.add');
    Route::get('/get-sub-category-by-category-id', [ProductController::class, 'getSubCategory'])->name('product.sub-category');
    Route::post('/create-product', [ProductController::class, 'create'])->name('product.create');
    Route::get('/manage-product', [ProductController::class, 'manage'])->name('product.manage');
    Route::get('/detail-product/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/delete-product/{id}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('/add-user', [UserController::class, 'add'])->name('user.add');
    Route::get('/manage-user', [UserController::class, 'manage'])->name('user.manage');

    Route::get('/admin-order-manage', [AdminOrderController::class, 'index'])->name('admin.order-manage');
    Route::get('/admin-order-detail/{id}', [AdminOrderController::class, 'detail'])->name('admin.order-detail');
    Route::get('/admin-order-invoice/{id}', [AdminOrderController::class, 'invoice'])->name('admin.order-invoice');
    Route::get('/admin-order-invoice-download/{id}', [AdminOrderController::class, 'downloadInvoice'])->name('admin.order-invoice-download');
    Route::get('/admin-order-update/{id}', [AdminOrderController::class, 'update'])->name('admin.order-update');
    Route::get('/admin-order-delete/{id}', [AdminOrderController::class, 'delete'])->name('admin.order-delete');

    Route::get('/manage-setting', [SettingController::class, 'manage'])->name('setting.manage');
});
